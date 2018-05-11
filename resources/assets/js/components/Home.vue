<template>
    <div class="row">
        <div class="col-sm-2 home-left-menu">
            <img src="/images/brand/logo_icon.png" alt="Cloudofe"><br/><br/>
            <h2 class="left-menu__title">Files</h2>
            <div class="left-menu__links">
                <a href="/files">My Files</a>
                <a href="/sharing">Sharing</a>
                <a href="/file_request">File Request</a>
                <a href="/deleted_files">Deleted Files</a>
            </div>
        </div>
        <div class="col-sm-10 home-files">
            <h2><span class="home-files__title">Cloudofe</span></h2>
            <div class="row">
                <div class="col-sm-3">
                    <form class="search-files"><input class="" type="text"></form>
                </div>
                <div class="col-sm-3">

                </div>
                <div class="col-sm-3">
                </div>
                <div class="col-sm-3">
                    <div class="dropdown">
                        <i class="fa fa-user-circle fa-2x text-primary dropdown-toggle" data-toggle="dropdown"></i>
                        <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                            <a href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                                Logout
                            </a>
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                <input type="hidden" name="_token" :value="csrf">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 alert-container">
                    <div class="alert alert-success" v-if="msg_success">
                        {{alert}}
                    </div>
                    <div class="alert alert-warning" v-if="msg_error">
                        {{alert}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <table class="table files-table">
                        <thead>
                            <tr>
                                <th><span>Name</span> <i class="fa fa-arrow-up"></i></th>
                                <th><span>Modified</span> <i class="fa fa-caret-down"></i></th>
                                <th><span>Members</span></th>
                                <th><i class="fa fa-list"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="file in files">
                                <td>{{file.name}}</td>
                                <td>{{file.updated_at}}</td>
                                <td>{{file.members}}</td>
                                <td  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item text-capitalize" href="#" @click="deleteFile(file.id)">delete</a>
                                        <a class="dropdown-item text-capitalize" href="#">share</a>
                                        <a class="dropdown-item text-capitalize" href="#">edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-capitalize"  href="#">download</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-2 home-right-menu">
                    <form @submit.prevent="createFile()" enctype="multipart/form-data">
                        <input type="hidden" name="_token" :value="csrf">
                        <button class="btn btn-primary btn-block" onclick="document.getElementById('file').click();"><i class="fa fa-upload"></i> Upload</button>
                        <input type="file" @change="createFile" id="file" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });
    export default {
            data(){
                return {
                    file : '',
                    alert : '',
                    msg_success : false,
                    msg_error : false
                }
            },
            props : ['files', 'csrf'],
            created(){
                console.log(this.csrf);
            },
            methods:{
                fetchFiles(){
                    axios.get('/files').then((res) => {
                        this.files = res.data.files
                    }).catch((err) => console.error(err));
                },
                createFile(e){
                    let formData = new FormData();
                    formData.append('file', document.getElementById('file').files[0]);
                    formData.append('_token', this.csrf);
                    axios.post('/files', formData).then((res) => {
                        let fileResult = res.data.file;
                        this.files = fileResult.data;
                        if(fileResult.type === "fail"){
                            this.msg_error = true;
                            this.msg_success = false;
                        }else{
                            this.msg_error = false;
                            this.msg_success = true;
                        }
                        this.alert = fileResult.msg;
                        this.setCounter(fileResult.type);
                        this.fetchFiles();
                        document.getElementById('file').value = "";
                    }).catch((err) => console.error(err));
                },
                deleteFile(id){
                    axios.delete('/files/' + id).then((res) => {
                        let result = res.data.result;
                        if(result.type === "fail"){
                            this.msg_error = true;
                            this.msg_success = false;
                        }else{
                            this.msg_error = false;
                            this.msg_success = true;
                        }
                        this.alert = result.msg;
                        this.setCounter(result.type);
                        this.fetchFiles();
                    }).catch((err) => console.error(err));
                },
                setCounter(type){
                    switch (type){
                        case 'fail':
                            setTimeout(function(){
                                $(".alert-warning").css('display', 'none');
                            }, 500);
                            break;
                        case 'success':
                            setTimeout(function(){
                                $(".alert-success").css('display', 'none');
                            }, 500);
                            break;
                        default:
                            break;
                    }
                    $(".alert-success").css('display', '');
                    $(".alert-warning").css('display', '');
                }
            },
            mounted(){
            }
        }
</script>