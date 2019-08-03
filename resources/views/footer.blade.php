@section('footer')
</div>
    </div>
     
    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{asset('/js/materialize.min.js')}}"></script>
    <script src="{{asset('js/angular.min.js')}}" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/dirPagination.js')}}"></script>
    <script src="{{asset('js/angular-pagination.js')}}"></script>
    <script>
         $(document).ready(function(){
 
            $('#sidenav-1').sidenav({ edge: 'left' });
            $(".dropdown-trigger").dropdown({coverTrigger:false});
        });
    </script>
</body>
</html>
@show