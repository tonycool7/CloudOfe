<template>
    <div class="row">
        <div class="col-sm-2 home-left-menu">
            <img src="/images/brand/logo_icon.png" alt="Cloudofe"><br/><br/>
            <h2 class="left-menu__title">Files</h2>
            <div class="left-menu__links">
                <a href="/home">My Files</a>
                <a href="/sharing">Sharing</a>
                <a href="/file_request">File Request</a>
                <a href="/deleted_files">Deleted Files</a>
            </div>
        </div>
        <div class="col-sm-10 home-files">
            <h2><span class="home-files__title">Cloudofe</span></h2>
            <div class="row">
                <div class="col-sm-3">
                    <form class="search-files"><input class="" placeholder="search" type="text"></form>
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
                            <tr v-if="newfolder">
                                <td class="row"><i class="fa fa-folder fa-2x text-primary col-sm-1"></i>
                                    <form @submit.prevent="createNewFolder()" class="col-sm-9 new-folder-form">
                                        <input class="form-control" v-model="folderName">
                                    </form>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr v-for="folder in folderslist">
                                <td><a href="#" @click.prevent="cd(folder.id)"><i class="fa fa-folder fa-2x text-primary"></i> <span>{{folder.name}}</span></a></td>
                                <td>{{folder.updated_at}}</td>
                                <td>{{folder.members}}Only You</td>
                                <td  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item text-capitalize" href="#" @click="deleteFolder(folder.id)">delete</a>
                                        <a class="dropdown-item text-capitalize" href="#">share</a>
                                        <!--<a class="dropdown-item text-capitalize" href="#">edit</a>-->
                                        <!--<div class="dropdown-divider"></div>-->
                                        <!--<a class="dropdown-item text-capitalize" href="#" @click.prevent="download(folder.id)">download</a>-->
                                    </div>
                                </td>
                            </tr>
                            <tr v-for="file in filelist">
                                <td><i class="fa fa-file-text fa-2x text-primary"></i> <span>{{file.name}}</span></td>
                                <td>{{file.updated_at}}</td>
                                <td>{{file.members}}Only You</td>
                                <td  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item text-capitalize" href="#" @click="deleteFile(file.id)">delete</a>
                                        <a class="dropdown-item text-capitalize" href="#">share</a>
                                        <a class="dropdown-item text-capitalize" href="#">edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-capitalize" href="#" @click.prevent="download(file.id)">download</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-2 home-right-menu">
                    <form @submit.prevent="createFile()" enctype="multipart/form-data">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="folder_id" :value="folder_id">
                        <button class="btn btn-primary btn-block" onclick="document.getElementById('file').click();"><i class="fa fa-upload"></i> Upload File</button>
                        <input type="file" @change="createFile" id="file" class="btn btn-primary btn-block">
                    </form>
                    <ul class="right-menu__menu">
                       <li><a href="#"><i class="fa fa-share-alt"></i> New Shared Folder</a></li>
                       <li><a href="#" @click.prevent="showNewFolderForm()"><i class="fa fa-folder-o"></i> New Folder</a></li>
                       <li><a href="#"><i class="fa fa-eye"></i> Show Deleted Files</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
            data(){
                return {
                    filelist : this.files,
                    folderslist : this.folders,
                    folder_id : this.root_folder_id,
                    alert : '',
                    newfolder : false,
                    msg_success : false,
                    folderName : '',
                    msg_error : false
                }
            },
            props : ['files', 'csrf', 'root_folder_id', 'folders'],
            created(){
                console.log(this.folderslist);
            },
            methods:{
                fetchFiles(){
                    axios.get('/folder/' + this.folder_id).then((res) => {
                        console.log(res);
                        this.filelist = res.data.files.data;
                        this.folderslist = res.data.folders.data;
                        this.folder_id = res.data.root_folder_id;
                    }).catch((err) => console.error(err));
                },
                showNewFolderForm(){
                    this.newfolder = !this.newfolder;
                },
                createFile(e){
                    let formData = new FormData();
                    formData.append('file', document.getElementById('file').files[0]);
                    formData.append('_token', this.csrf);
                    formData.append('folder_id', this.folder_id);
                    axios.post('/files', formData).then((res) => {
                        let fileResult = res.data.file;
                        this.filelist = fileResult.data;
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
                    if(confirm("Are you sure you want to delete this file?")){
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
                    }
                },
                deleteFolder(id){
                    if(confirm("Are you sure you want to delete this folder?")){
                        axios.delete('/folder/' + id).then((res) => {
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
                    }
                },
                cd(id){
                    axios.get('/folder/'+ id).then((res) => {
                        this.filelist = res.data.files.data;
                        this.folderslist = res.data.folders.data;
                        this.folder_id = res.data.root_folder_id;
                    }).catch((err) => console.error(err));
                },
                setCounter(type){
                    switch (type){
                        case 'fail':
                            setTimeout(function(){
                                $(".alert-warning").css('display', 'none');
                            }, 2000);
                            break;
                        case 'success':
                            setTimeout(function(){
                                $(".alert-success").css('display', 'none');
                            }, 2000);
                            break;
                        default:
                            break;
                    }
                    $(".alert-success").css('display', '');
                    $(".alert-warning").css('display', '');
                },
                download(id){
                    window.location.replace('/files/'+id);
                },
                createNewFolder(){
                    let formData = new FormData();
                    formData.append('name', this.folderName);
                    formData.append('_token', this.csrf);
                    formData.append('folder_id', this.folder_id);
                    axios.post('/folder', formData).then((res) => {
                        let fileResult = res.data.folders;
                        this.folderslist = fileResult.data;
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
                        this.newfolder = false;
                    }).catch((err) => console.error(err));
                }
            },
            mounted(){
            }
        }
</script>