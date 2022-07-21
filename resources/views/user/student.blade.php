@extends('templates.layout')
@section('css')
    <style>
        body {
            /*-webkit-touch-callout: none;
                                                        -webkit-user-select: none;
                                                        -moz-user-select: none;
                                                        -ms-user-select: none;
                                                        -o-user-select: none;*/
            user-select: none;
        }

        .toolbar-box form .btn {
            /*margin-top: -3px!important;*/
        }

        .select2-container {
            margin-top: 0;
        }

        .select2-container--default .select2-selection--multiple {
            border-radius: 0;
        }

        .select2-container .select2-selection--multiple {
            min-height: 30px;
        }

        .select2-container .select2-search--inline .select2-search__field {
            margin-top: 3px;
        }

        .table>tbody>tr.success>td {
            background-color: #009688;
            color: white !important;
        }

        .table>tbody>tr.success>td span {
            color: white !important;
        }

        .table>tbody>tr.success>td span.button__csentity {
            color: #333 !important;
        }

        /*.table>tbody>tr.success>td i{*/
        /*    color: white !important;*/
        /*}*/
        .text-silver {
            color: #f4f4f4;
        }

        .btn-silver {
            background-color: #f4f4f4;
            color: #333;
        }

        .select2-container--default .select2-results__group {
            background-color: #eeeeee;
        }
    </style>
@endsection
@section('content')
    <div class="">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>ten</th>
                <th>khoa</th>
                <th>tuoi</th>
            </tr>
            @foreach ($lists as $list)
                <tr>
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->tensv }}</td>
                    <td>{{ $list->khoa }}</td>
                    <td>{{ $list->tuoi }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
