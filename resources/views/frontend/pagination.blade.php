@extends('components.main')
@section('container')
    <style>
.head-block{
    padding-top: 30px;
    padding-bottom: 15px;
    padding-left: 10px;

}
.slogan{
    
    font-size: 18px;
    line-height: 30px;
}
.head{
    font-size: 17px;
}



    </style>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="head-block">
                <div class="slogan">
                    <strong>eMRDS :</strong>
                    eMRDS All
                </div>
                <div class="head">
                    All records Including Closed
                </div>
            </div>
            <table id="table_id"    class="table table-condensed table-striped table-hover">

                <table id="example" class="display" width="100%"></table>
               
            </table>
                    </div>
    </div> 
    
@endsection
