<header class="main-header">
    <div class="container-fluid">
        <div class="header-content">
            <div class="nav-wrapper mb-3">
                <a href="<?php echo home_url(); ?>" class="logo">
                    <img src="<?php echo image('logo.svg'); ?>" alt="<?php echo bloginfo('name'); ?>">
                </a>
                <div class="ml-2">
                    <img src="<?php echo image('location.svg'); ?>" alt="<?php echo bloginfo('name'); ?>" width="49px" height="46px">
                    Enviar para
                    <span>CEP</span>
                </div>
                <ul class="main-nav col-lg-8">
                    <li class="search">
                        <form action="<?php echo base_url(); ?>">
                            <input
                                    type="search"
                                    class="form-control search-input"
                                    name="s"
                                    required
                                    placeholder="<?php _e('Digite o que está procurando...', 'template'); ?>"
                            >
                        </form>
                    </li>
                </ul>
            </div>
            <div class="nav-wrapper justify-content-center">
                <?php
                    $items = wp_get_nav_menu_items('menu-principal');
                    
                    if (!empty($items)) :
                        $formattedItems = buildTree($items);
                ?>
                    <div class="d-flex h-100 align-items-center d-md-none">
                        <button class="btn toggle-mobile-menu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="4rem" height="4rem" viewBox="0 0 200 200">
                                <g stroke-width="6.5" stroke-linecap="round">
                                    <path d="M72 82.286h28.75" stroke="#fff" />
                                    <path d="M100.75 103.714l72.482-.143c.043 39.398-32.284 71.434-72.16 71.434-39.878 0-72.204-32.036-72.204-71.554" fill="none" stroke="#fff" />
                                    <path d="M72 125.143h28.75" stroke="#fff"/>
                                    <path d="M100.75 103.714l-71.908-.143c.026-39.638 32.352-71.674 72.23-71.674 39.876 0 72.203 32.036 72.203 71.554" fill="none" stroke="#fff" />
                                    <path d="M100.75 82.286h28.75" stroke="#fff" />
                                    <path d="M100.75 125.143h28.75" stroke="#fff" />
                                </g>
                            </svg>
                        </button>
                    </div>
                    <ul class="main-nav">
                        <?php 
                            function renderMenuItems($itemsToRender) {
                                foreach($itemsToRender as $item) {
                                    $liClass = !empty($item->children) ? 'has-children' : '';

                                    echo '<li class="' . $liClass . '">';
                                        if (!empty($item->children)) {
                                            echo sprintf('<a href="#" target="%s">%s</a>', $item->target, $item->title);
                                            echo '<ul class="sub-menu">';
                                                renderMenuItems(
                                                    array_merge(
                                                        [(object)['url' => $item->url, 'target' => $item->target, 'title' => $item->title]], 
                                                        $item->children
                                                    )
                                                );
                                            echo '</ul>';
                                        }
                                        else {
                                            echo sprintf('<a href="%s" target="%s">%s</a>', $item->url, $item->target, $item->title);
                                        }
                                    echo '</li>';
                                }
                            } 
                            
                            renderMenuItems($formattedItems);
                        ?>
                    </ul>
                  
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
