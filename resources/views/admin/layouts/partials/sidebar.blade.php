<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li class="treeview active">
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="index.php"><i class="fa fa-circle-o"></i> Home</a></li>
    </ul>
  </li>
  
  <li class="treeview">
    <a href="#">
      <i class="fa fa-files-o"></i>
      <span>Master</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ url('/user') }}"><i class="fa fa-circle-o"></i> User</a></li>
      <li><a href="{{ url('/toko') }}"><i class="fa fa-circle-o"></i> Toko</a></li>
      <li><a href="{{ url('/sales') }}"><i class="fa fa-circle-o"></i> Sales</a></li>
      <li><a href="{{ url('/pelanggan') }}"><i class="fa fa-circle-o"></i> Pelanggan</a></li>
      <li><a href="{{ url('/kasir') }}"><i class="fa fa-circle-o"></i> Kasir</a></li>
      <li><a href="{{ url('/barang') }}"><i class="fa fa-circle-o"></i> Barang</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-dollar"></i>
      <span>Transaksi</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ url('/transaksi_baru') }}"><i class="fa fa-circle-o"></i> Transaksi Baru</a></li>
    </ul>
  </li>
  
</ul>