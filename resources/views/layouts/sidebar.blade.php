
    <!--
    |--------------------------------------------------------------------------
    | Sidebar Layout
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 28/11/2020
    |
    -->

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <!-- MODUL -->
        <!-- PARENT -->
        <?php $user_modul = Session::get(SESS_USER_NAME)['user_modul']; ?>
        <?php if(count($user_modul) > 0): ?>
          <li class="header">MAIN NAVIGATION</li>
            <?php foreach ($user_modul as $key => $value): ?>
                <?php if($value->is_menu == 0) continue; ?>
                <?php if($value->parent_id == 0): ?>
                <li class="treeview">
                    <?php
                        $url = '#';
                        if($value->url != null && $value->url != ''){
                            if(substr($value->url, 0, 7) == 'http://' || substr($value->url, 0, 3) == 'www'){
                                $url = $value->url;
                            }else{
                                $url = URL($value->url);
                            }
                    ?>
                     <a href="<?=$url;?>">
                        <i class="fa {{$value->icon}}"></i> 
                        {{$value->label}} 
                    </a>
                    <?php
                        } else {
                    ?>
                    <a href="<?=$url;?>">
                        <i class="fa {{$value->icon}}"></i> 
                        {{$value->label}} 
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <?php
                        }
                   
                        $total_child = 0;
                        foreach ($user_modul as $k => $v):
                            if($v->parent_id != $value->id) continue;
                            $total_child ++;
                        endforeach;
                    ?>
                    <!-- CHILD -->
                    <?php if($total_child > 0): ?>
                    <ul class="treeview-menu">
                        <?php foreach ($user_modul as $k => $v): ?>
                            <?php if($v->is_menu == 0) continue; ?>
                            <?php if($v->parent_id != $value->id) continue; ?>
                            <?php
                                $url2 = '#';
                                if($v->url != null && $v->url != ''){
                                    if(substr($v->url, 0, 7) == 'http://' || substr($v->url, 0, 3) == 'www'){
                                        $url2 = $v->url;
                                    }else{
                                        $url2 = URL($v->url);
                                    }
                                }
                            ?>

                            <li>
                                <a href="<?=$url2;?>"><i class="fa {{$v->icon}}"></i> {{$v->label}}</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </li>
                <?php endif;?>
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- MODUL -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>