<div class="footer">
    <div class="footer_bot">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="text-center">
                        @foreach($footertail as $footer)
                            <li><a href="{{$footer->id}}">{{$footer->menu_item_name}}</a></li>
                        @foreach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <a href="javascript:void(0);" id="back_scroll"><i class="fa fa-angle-up"></i></a>
</div>