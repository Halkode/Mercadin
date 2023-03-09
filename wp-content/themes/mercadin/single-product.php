<?php get_header(); ?>

<?php
    the_post();
?>

<section id="singleProducts">
    <?php
        $product = new WC_Product(get_the_ID());
    ?>

    <div class="container">
        <div class="row">
            <?php wc_print_notices(); ?>

            <div class="content-images-product col-12 col-lg-4">
                <div class="main-image d-flex justify-content-center">
                    <div class="imagem-single">
                        <img src="<?php the_post_thumbnail_url() ?>" alt="">
                    </div>
                </div>
                <h3 class="title-product"><?php the_title(); ?></h3>
                <form action="<?php the_permalink(); ?>" method="GET"  class="row">
                    <div class="price-product col-12 col-lg-4">
                        <?php 
                            $preco_produto = $product->get_regular_price(); 
                            $promo_produto = $product->get_sale_price(); 
                            $preco_final_produto = ($promo_produto) ? $promo_produto : $preco_produto; 
                            if ( $promo_produto) : 
                        ?>
                            <h5>
                                <span class="line-through">R$ <?php echo $preco_produto ?></span>
                            </h5>
                        <?php endif; ?>
                        <h5 class="price-second">R$ <?php echo $preco_final_produto ?></h5>
                    </div>
                    <div class="button-add-product col-12 col-lg-7 p-0">
                        <div class="input-group inline-group row">
                            <div class="input-change-quanty input-group-prepend col-3 p-0">
                                <button type="button" class="btn btn-outline-secondary btn-minus w-100">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input class="form-control quantity" min="0" name="quantity" value="1" type="number">
                            <div class="input-change-quanty input-group-append  col-3 p-0">
                                <button type="button" class="btn btn-outline-secondary btn-plus w-100">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>  
                    </div>
                    <input type="hidden" name="add-to-cart" value="<?php echo get_the_ID() ?>">
                    <div class="buy-button col-12">
                        <button type="submit" class="btn">Comprar</button>
                    </div>     
                </form>
            </div>
            <div class="informations-products col-12 col-lg-7 offset-1">
                <div class="row">
                    <div class="content-description col-12 col-lg-8">
                        <h2 class="title-description">
                            Descrição do produto
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>