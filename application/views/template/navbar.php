<body class="crm_body_bg">
  <nav class="sidebar vertical-scroll ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
      <a href="index-2.html"><img src="<?= base_url("assets/"); ?>vendor/frontend/images/drfashion.png" alt /></a>
      <div class="sidebar_close_icon d-lg-none">
        <i class="ti-close"></i>
      </div>
    </div>
    <ul id="sidebar_menu">
      <li class="<?= $title == 'Dashboard' || $title == 'Dashboard' ? 'mm-active' : '' ?>">
        <a href="<?= base_url("Dashboard"); ?>" aria-expanded="false">
          <div class="icon_menu">
            <i class="ti-home"></i>
          </div>
          <span style="<?= $title == 'Dashboard' || $title == 'Dashboard' ? 'color: #33476c;' : '' ?>">Dashboard</span>
        </a>
        </a>
      </li>
      <li class="<?= $title == 'User Card' || $title == 'User Card' ? 'mm-active' : '' ?>">
        <a class="has-arrow" href="#" aria-expanded="false">
          <div class="icon_menu">
            <img src="<?= base_url("assets/"); ?>img/menu-icon/2.svg" alt />
          </div>
          <span <?= $title == 'User Card' || $title == 'User Management' ? 'color: #33476c;' : '' ?>>User Management</span>
        </a>
        <ul <?= $title == 'User Card' || $title == 'User Management' || $title == 'User Access' ? 'mm-collapse mm-show' : 'mm-collapse' ?>>
          <li><a <?= $title == 'User Access' || $title == 'User Management' ? 'color: #33476c;' : '' ?> href="<?= base_url('user/'); ?>">User Access</a></li>
          <li><a <?= $title == 'User Card' || $title == 'User Management' ? 'color: #33476c;' : '' ?> href="<?= base_url('user/usercard'); ?>">User Card</a></li>
        </ul>
      </li>
      <li class="<?= $title == 'Monitoring' || $title == 'Monitoring' ? 'mm-active' : '' ?>">
        <a class="has-arrow" href="#" aria-expanded="false">
          <div class="icon_menu">
            <img src="<?= base_url("assets/"); ?>img/menu-icon/2.svg" alt />
          </div>
          <span <?= $title == 'Monitoring' || $title == 'Monitoring' ? 'color: #33476c;' : '' ?>>Monitoring</span>
        </a>
        <ul <?= $title == 'Monitoring' || $title == 'Monitoring' || $title == 'Ruangan' ? 'mm-collapse mm-show' : 'mm-collapse' ?>>
          <li><a <?= $title == 'Monitoring' || $title == 'Monitoring' ? 'color: #33476c;' : '' ?> href="<?= base_url('Monitoring/'); ?>">User Monitoring</a></li>
          <li><a <?= $title == 'Ruangan' || $title == 'Monitoring' ? 'color: #33476c;' : '' ?> href="<?= base_url('Monitoring/ruangan'); ?>">Ruangan</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <section class="main_content dashboard_part large_header_bg">
    <div class="container-fluid g-0">
      <div class="row">
        <div class="col-lg-12 p-0">
          <div class="header_iner d-flex justify-content-between align-items-center">
            <div class="sidebar_icon d-lg-none">
              <i class="ti-menu"></i>
            </div>
            <div class="header_right d-flex justify-content-end align-items-center flex-grow-1">
              <!-- Profile info moved to the right -->
              <div class="profile_info">
                <img src="<?= base_url("assets/"); ?>img/client_img.png" alt="#" />
                <div class="profile_info_iner">
                  <div class="profile_author_name">
                    <p>Neurologist</p>
                    <h5>Dr. Robar Smith</h5>
                  </div>
                  <div class="profile_info_details">
                    <a href="#">My Profile </a>
                    <a href="#">Settings</a>
                    <a href="#">Log Out </a>
                  </div>
                </div>
              </div>
              <!-- End of Profile info -->
            </div>
          </div>
        </div>
      </div>