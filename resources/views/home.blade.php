@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 home-left-menu">

        </div>
        <div class="col-md-8 home-files">
            <table>
                <thead>
                    <tr>
                        <th>Name <i class="fa fa-arrow-up"></i></th>
                        <th>Modified <i class="fa fa-caret-down"></i></th>
                        <th>Members</th>
                        <th>Action <i class="fa fa-list"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="files in file">
                        <td>{{file.name}}</td>
                        <td>{{file.modified}}</td>
                        <td>{{file.members}}</td>
                        <td>...</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-2 home-right-menu">

        </div>
    </div>
</div>
@endsection
