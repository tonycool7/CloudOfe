<template>
    <div class="row">
        <div class="col-sm-2 home-left-menu">
            <img src="/images/brand/logo_icon.png" alt="Cloudofe"><br/><br/>
            <h2>Files</h2><br/>
            <div class="left-menu__links">
                <a href="/my_files">My Files</a>
                <a href="/sharing">Sharing</a>
                <a href="/file_request">File Request</a>
                <a href="/deleted_files">Deleted Files</a>
            </div>
        </div>
        <div class="col-sm-10 home-files">
            <h2>Cloudofe
            <div class="dropdown pull-right">
                <i class="fa fa-user-circle text-primary dropdown-toggle" data-toggle="dropdown"></i>
                <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                    <a href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                        Logout
                    </a>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                       <input type="hidden" name="_token" :value="csrf">
                    </form>
                </div>
            </div>
            <form class="pull-right search-files"><input class="" type="text"></form></h2>
            <br/><br/>
            <div class="row">
                <div class="col-sm-10">
                    <table class="table files-table">
                        <thead>
                            <tr>
                                <th>Name <i class="fa fa-arrow-up"></i></th>
                                <th>Modified <i class="fa fa-caret-down"></i></th>
                                <th>Members</th>
                                <th>Action <i class="fa fa-list"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="file in files">
                                <td>{{file.name}}</td>
                                <td>{{file.modified}}</td>
                                <td>{{file.members}}</td>
                                <td>...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-2 home-right-menu">
                    <form method="post" action="" >
                        <button class="btn btn-primary btn-block">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
            data(){
                return {
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
                    })
                    .catch((err) => console.error(err));
                },
                deleteFiles(id){
                    axios.delete('/files/' + id).then((res) => {
                        this.deleteResponse = res.data.delete;
                        this.fetchFiles();
                    })
                    .catch((err) => console.error(err));
                }
            },
            mounted(){
            }
        }
</script>