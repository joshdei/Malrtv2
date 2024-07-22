@if (auth()->check())
<!-- User is authenticated -->
  <?php
  $id = auth()->user()->id;
  $checkUser = DB::select('select * from verifedaccounts where usersid = ?', [$id]) ;
    
  ?>
  @if ($checkUser)
  @include('dashboard');
  @else