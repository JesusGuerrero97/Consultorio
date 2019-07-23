@section('footer')
</div>
    </div>
     
    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{asset('/js/materialize.min.js')}}"></script>
    <script>
         $(document).ready(function(){
 
	$('#sidenav-1').sidenav({ edge: 'left' });
});
    </script>
</body>
</html>
@show