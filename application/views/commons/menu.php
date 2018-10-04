    <!-- main sidebar -->
    <aside id="sidebar_main">
        
        <div class="sidebar_main_header">
            Bienvenido:<br>
            <div class="sidebar_logo">
                 
                <strong><?=$this->session->userdata('username')?></strong>
            </div>
            
        </div>
        
        <div class="menu_section">
            <ul>
                <li <?php if($menu == 0 ) { ?> class="current_section" <?php } ?> title="Dashboard">
                    <a href="<?php echo base_url();?>dashboard/index">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Dashboard</span>
                    </a>
                    
                </li>
               <?php foreach ($this->session->userdata('listMenu') as $menuk) { ?> 
                    <li <?php if($menu == $menuk->id ) { ?> class="current_section" <?php } ?> title="Dashboard">
                        <a href="<?php echo base_url().$menuk->url;?>">
                            <span class="menu_icon"><i class="material-icons"><?= $menuk->icon ?></i></span>
                            <span class="menu_title"><?= $menuk->name ?></span>
                        </a>
                        
                    </li>
                <?php } ?>
                <li title="Salir">
                    <a href="<?php echo base_url();?>dashboard/logout_ci">
                        <span class="menu_icon"><i class="material-icons">&#xE8C6;</i></span>
                        <span class="menu_title">Salir</span>
                    </a>
                    
                </li>
            </ul>
        </div>
    </aside><!-- main sidebar end -->