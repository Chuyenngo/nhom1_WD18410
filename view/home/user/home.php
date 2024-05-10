<?php
require_once('view/globle/user/header.php');
require_once('DAO/ProductDAO.php');
?>
<!-- <h1>Home user</h1> -->
<!--==============================
      Hero Area
    ==============================-->
<div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200" style="background-image: url(./src/assets/img/breadcumb/breadcumb-img-1.jpg); height: 700px; margin-bottom: -100px;">
  <div class="container">
    <div class="breadcumb-content text-center">


    </div>
  </div>
</div>

<!--==============================
    Feature Products
    ==============================-->

<section class="sec-bg3 vs-shop-wrapper" data-bg-src="./src/assets/img/shape/bg-00778.png">
  <div class="section-title text-center">
    <div class="sec-icon">
      <img src="./src/assets/img/icons/sec-icon-2.png" alt="icon" />
    </div>
    <span class="sub-title4">Latest Arrivals</span>
    <h2 class="sec-title3">Feature Products</h2>
  </div>
  <div class="container position-relative">
    <div class="filter-menu2 vs-slideTab" data-asnavfor="#shopSlide8440">
      <button class="tab-btn active" data-bs-toggle="tooltip" data-bs-placement="left" title="Best Seller">
        <img src="./src/assets/img/shape/filter-icon-bg-1-2.png" alt="image" class="bg-1" />
        <img src="./src/assets/img/shape/filter-icon-bg-1-1.png" alt="image" class="bg-2" />
        <i class="flaticon-salad"></i>
      </button>
      <button class="tab-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Popular">
        <img src="./src/assets/img/shape/filter-icon-bg-1-2.png" alt="image" class="bg-1" />
        <img src="./src/assets/img/shape/filter-icon-bg-1-1.png" alt="image" class="bg-2" />
        <i class="flaticon-salvsadbox-1"></i>
      </button>
      <button class="tab-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Trend">
        <img src="./src/assets/img/shape/filter-icon-bg-1-2.png" alt="image" class="bg-1" />
        <img src="./src/assets/img/shape/filter-icon-bg-1-1.png" alt="image" class="bg-2" />
        <i class="flaticon-vegetables"></i>
      </button>
      <button class="tab-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Season">
        <img src="./src/assets/img/shape/filter-icon-bg-1-2.png" alt="image" class="bg-1" />
        <img src="./src/assets/img/shape/filter-icon-bg-1-1.png" alt="image" class="bg-2" />
        <i class="flaticon-healthy-food"></i>
      </button>
    </div>
    <div class="vs-carousel" data-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-fade="true" id="shopSlide8440">
      <div id="BestSeller">
        <div class="row gx-2px justify-content-center">

          <?php
          require_once 'DAO/ProductDAO.php';

          $productDao = new ProductDao();
          $products = $productDao->select(); // Lấy danh sách sản phẩm
          // var_dump($products);

          $linkpro = "index.php?controller=product_details&idpro="; // Xây dựng đường dẫn sản phẩm


          ?>

          <?php foreach ($products as $product) : ?>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">

              <div class="vs-product-box3">
                <div class="product-img">

                  <a href="<?php echo $linkpro . $product->getId(); ?>"><img src="admin_/uploads/products/<?php echo $product->getImage() ?>" alt="Product Image" class="w-100" /></a>
                </div>
                <div class="actions-btn">
                  <a href="" class="icon-btn popup-image"><i class="far fa-search "> </i></a>
                  <a href="<?php echo $linkpro . $product->getId(); ?>" class="icon-btn"><i class="fal fa-heart"></i></a>
                  <a href="index.php?controller=addCart&id=<?php echo $product->getId(); ?>" class="vs-btn style4 cart-btn" name="addToCart"><i class="fal fa-cart-plus"></i>Add To Cart</a>
                </div>

                <div class="product-content">
                  <div class="product-rating-box">
                    5.0
                    <div class="star-rating" permissions="img" aria-label="Rated 5.00 out of 5">
                      <span style="width: 100%">Rated <strong class="rating">5.00</strong> out of
                        5</span>
                    </div>
                  </div>
                  <h4 class="product-title">
                    <a href="<?php echo $linkpro . $product->getId(); ?>"><?php echo $product->getName(); ?></a>
                  </h4>
                  <span class="price">$<strong><?php echo $product->getPrice(); ?></strong><del></del></span>
                </div>
              </div>

            </div>
          <?php endforeach; ?>
          <div class="bottom-btn">
            <a href="index.php?controller=product_show" class="vs-btn style3">All Product<i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
</section>
<!--==============================
    Latest Arrivals
    ==============================-->
<?php
require_once 'DAO/ProductDAO.php';
$productDao = new ProductDao();
$product = $productDao->newProduct();
?>
<section class="mb-60 mb-xl-0">
  <div class="container">
    <div class="section-title text-center">
      <div class="sec-icon">
        <img src="./src/assets/img/icons/sec-icon-2.png" alt="icon" />
      </div>
      <span class="sub-title4">Latest Arrivals</span>
      <h2 class="sec-title3">Deals Of the Day</h2>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-4 order-3 order-lg-1">
        <div class="content-style1">


          <span class="about-subtitle"><?php echo $product[0]->getName(); ?></span>
          <h3 class="about-title"><?php echo $product[0]->getName(); ?></h3>
          <p class="about-text">
            <?php echo $product[0]->getDescription(); ?>
          </p>
          <div class="about-price">$<?php echo  $product[0]->getPrice(); ?>
            <del><?php echo  $product[0]->getPrice() * 1.2; ?></del>
          </div>

          <div class="product-rating-box">
            5.0
            <div class="star-rating" permissions="img" aria-label="Rated 5.00 out of 5">
              <span style="width: 100%">Rated <strong class="rating">5.00</strong> out of 5</span>
            </div>
          </div>
          <div>
            <a href="index.php?controller=addCart&id=<?php echo  $product[0]->getId(); ?>" name="addToCart" class="vs-btn style4"><i class="fal fa-cart-plus"></i>Add To Cart</a>
          </div>
        </div>
      </div>
      <div class="col-lg order-1 order-lg-2">
        <div class="img-box3">
          <img src="admin_/uploads/products/<?php echo  $product[0]->getImage() ?>" alt="About Image" />
        </div>

      </div>


      <div class="col-lg-auto order-2 order-lg-3">
        <div class="offer-counter counter-style1" data-offer-date="01/2/2024">
          <span class="day">Days</span>
          <span class="hour">Hours</span>
          <span class="minute">Mins</span>
          <span class="second">Secs</span>
          <!-- Expire Message -->
          <span class="message">Offer closed</span>
        </div>
      </div>
    </div>
  </div>
</section>
<!--==============================
    Feature Area
    ==============================-->
<section class="space-md-bottom">
  <div class="container">
    <div class="row gx-10">
      <div class="col-md-6 col-lg-3">
        <div class="feature-style1">
          <div class="feature-icon">
            <img src="./src/assets/img/icons/feature-icon-1-1.png" alt="icon" />
          </div>
          <h3 class="feature-title">Easy Returns</h3>
          <p class="feature-text">No Questions Asked</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="feature-style1">
          <div class="feature-icon">
            <img src="./src/assets/img/icons/feature-icon-1-2.png" alt="icon" />
          </div>
          <h3 class="feature-title">Certified Organic</h3>
          <p class="feature-text">100% Guarantee</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="feature-style1">
          <div class="feature-icon">
            <img src="./src/assets/img/icons/feature-icon-1-3.png" alt="icon" />
          </div>
          <h3 class="feature-title">Huge Savings</h3>
          <p class="feature-text">At Lowest Price</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="feature-style1">
          <div class="feature-icon">
            <img src="./src/assets/img/icons/feature-icon-1-4.png" alt="icon" />
          </div>
          <h3 class="feature-title">Easy Returnsz</h3>
          <p class="feature-text">No Questions Asked</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--==============================
    Popular Package Box
    ==============================-->
<section class="position-relative space-top space-md-bottom">
  <div class="sec-bg4" data-bg-src="./src/assets/img/shape/bg-00779.png"></div>
  <div class="container">

    <div class="section-title text-center">
      <div class="sec-icon">
        <img src="./src/assets/img/icons/sec-icon-2.png" alt="icon" />
      </div>
      <span class="sub-title4">Here is</span>
      <h2 class="sec-title3">The Most Favorite Products</h2>

    </div>

    <div class="vs-carousel" data-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-fade="true" id="shopSlide8440">
      <div id="BestSeller">
        <div class="row gx-2px justify-content-center">

          <?php
          require_once 'DAO/ProductDAO.php';

          $productDao = new ProductDao();
          $product = $productDao->selectFP(); // Lấy danh sách sản phẩm

          $linkpro = "index.php?controller=product_details&idpro="; // Xây dựng đường dẫn sản phẩm

          // print_r($product); 
          foreach ($product as $key => $value) : ?>

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">

              <div class="vs-product-box3">
                <div class="product-img">

                  <a href="<?php echo $linkpro . $value->getId(); ?>"><img src="admin_/uploads/products/<?php echo $value->getImage() ?>" alt="Product Image" class="w-100" /></a>
                </div>
                <div class="actions-btn">
                  <a href="<?php echo $linkpro . $value->getId(); ?>" class="icon-btn popup-image"><i class="far fa-search"></i></a>
                  <a href="<?php echo $linkpro . $value->getId(); ?>" class="icon-btn"><i class="fal fa-heart"></i></a>
                  <a href="index.php?controller=addCart&id=<?php echo $value->getId(); ?>" class="vs-btn style4 cart-btn"><i class="fal fa-cart-plus" name="addToCart"></i>Add To Cart</a>
                </div>

                <div class="product-content">
                  <div class="product-rating-box">
                    5.0
                    <div class="star-rating" permissions="img" aria-label="Rated 5.00 out of 5">
                      <span style="width: 100%">Rated <strong class="rating">5.00</strong> out of
                        5</span>
                    </div>
                  </div>
                  <h4 class="product-title">
                    <a href="<?php echo $linkpro . $value->getId(); ?>"><?php echo $value->getName(); ?></a>
                  </h4>
                  <span class="price">$<strong><?php echo $value->getPrice(); ?></strong><del></del></span>
                </div>
              </div>

            </div>
          <?php endforeach; ?>
          <div class="bottom-btn">
            <a href="index.php?controller=product_show" class="vs-btn style3">All Product<i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!--==============================
    Buy Whole Food Online at Real Foods
    ==============================-->
<section class="space-bottom">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 mb-40 mb-xl-0">
        <div class="img-box4">
          <div class="img-1">
            <img src="./src/assets/img/about/ab-8-1.png" alt="About Image" />
          </div>
          <div class="img-2">
            <img src="./src/assets/img/about/ab-8-2.png" alt="About Image" />
          </div>
          <div class="content">
            <div class="title">Natural Organic</div>
            <div class="text">
              Alienum phaedrum torquat os nec eu, vis detrax.
            </div>
          </div>
        </div>
      </div>
      <?php

      require_once('DAO/ProductDAO.php');
      $productDao = new ProductDao();
      $linkpro = "index.php?controller=product_details&idpro=" . 7;
      $result = $productDao->getProductsByCategory("Áo Polo");
      // print_r($result);
      $products = $result['products'];
      // die($products);
      $category = $result['category'];
      // die( $category);
      ?>
      <div class="col-xl-6">
        <div class="content-style2">
          <span class="sub-title4"><?php echo $result['category']->getName(); ?></span>
          <h2 class="sec-title3">Find Fashionable Clothing Online at Real Wardrobe</h2>
          <p class="sec-text">
            <?php echo $result['category']->getDescription(); ?>
          </p>
          <div class="row mt-lg-3 pt-3 gy-4">
            <?php foreach ($result['products'] as $product) { ?>
              <div class="col-md-6">
                <div class="vs-product-box3 style2">

                  <div class="product-img">
                    <!-- ../../../admin_/uploads/products/Mini_Apple.png
                  \admin_\uploads\products\Mini_Apple.png -->
                    <a href="<?php echo $linkpro . $product->getId(); ?>"><img src="admin_/uploads/products/<?php echo $product->getImage() ?>" alt="Product Image" class="w-100" /></a>

                    <span class="product-tag1">Hot</span>
                  </div>
                  <div class="actions-btn">
                    <a href="<?php echo $linkpro . $product->getId(); ?>" class="icon-btn popup-image"><i class="far fa-search"></i></a>
                    <!-- <a href="<?php echo $product->getImage(); ?>" class="icon-btn popup-image"><i class="far fa-search"></i></a> -->
                    <a href="index.php?controller=wishlistCart&id=<?php echo $product->getId(); ?>" class="icon-btn"><i class="fal fa-heart"></i></a>
                    <a href="index.php?controller=addCart&id=<?php echo $product->getId(); ?>" class="vs-btn style4 cart-btn"><i class="fal fa-cart-plus" name="addToCart"></i>Add To Cart</a>
                  </div>
                  <div class="product-content">
                    <div class="product-rating-box">
                      5.0
                      <div class="star-rating" permissions="img" aria-label="Rated 5.00 out of 5">
                        <span style="width: 100%">Rated <strong class="rating">5.00</strong> out of
                          5</span>
                      </div>
                    </div>
                    <h4 class="product-title">
                      <a href="<?php echo $linkpro; ?>"><?php echo $product->getName(); ?></a>
                    </h4>
                    <span class="price">$<strong><?php echo $product->getPrice(); ?></strong></span>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>


      </div>
    </div>
  </div>
</section>
<!--==============================
    Subscribe Area
    ==============================-->

<!--==============================
        Blog Area
    ==============================-->
<section class="vs-blog-wrapper space-top space-md-bottom">
  <div class="container">
    <div class="section-title text-center">
      <div class="sec-icon">
        <img src="./src/assets/img/icons/sec-icon-2.png" alt="icon" />
      </div>
      <span class="sub-title4">Tips & News</span>
      <h2 class="sec-title3">Recent Articles</h2>
    </div>
    <div class="row vs-carousel" data-slide-show="3" data-sm-slide-show="1">
      <div class="col-xl-4">
        <div class="vs-blog blog-style1">
          <div class="blog-img image-scale-hover">
            <a href="blog-details.html"><img src="./src/assets/img/blog/blog-4-1.jpg" alt="Blog Image" class="w-100" /></a>
          </div>
          <div class="blog-content">
            <div class="tags">
              <a href="blog-details.html">Organic</a>
            </div>
            <a href="blog-details.html" class="blog-date">Dec 22,2022</a>
            <h3 class="blog-title">
              <a href="blog-details.html">From its medieval origins to the digital
              </a>
            </h3>
            <p class="blog-text">
              Nvidunt ut labore et dolore magna aliqu accusam et justo duo
              dolores et ea rebu Lorem ipsum dolor sit ametrit.
            </p>
          </div>
          <div class="meta-box">
            <a href="blog-details.html">Posted By Admin</a>
            <a href="blog-details.html">5 Comments</a>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="vs-blog blog-style1">
          <div class="blog-img image-scale-hover">
            <a href="blog-details.html"><img src="./src/assets/img/blog/blog-4-2.jpg" alt="Blog Image" class="w-100" /></a>
          </div>
          <div class="blog-content">
            <div class="tags">
              <a href="blog-details.html">Popular</a>
            </div>
            <a href="blog-details.html" class="blog-date">Dec 18,2022</a>
            <h3 class="blog-title">
              <a href="blog-details.html">Latin derived from Cicero's 1st-century</a>
            </h3>
            <p class="blog-text">
              Nvidunt ut labore et dolore magna aliqu accusam et justo duo
              dolores et ea rebu Lorem ipsum dolor sit ametrit.
            </p>
          </div>
          <div class="meta-box">
            <a href="blog-details.html">Posted By Ripon</a>
            <a href="blog-details.html">3 Comments</a>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="vs-blog blog-style1">
          <div class="blog-img image-scale-hover">
            <a href="blog-details.html"><img src="./src/assets/img/blog/blog-4-3.jpg" alt="Blog Image" class="w-100" /></a>
          </div>
          <div class="blog-content">
            <div class="tags">
              <a href="blog-details.html">Fresh</a>
            </div>
            <a href="blog-details.html" class="blog-date">Jan 21,2022</a>
            <h3 class="blog-title">
              <a href="blog-details.html">Creation timelines for the standard lorem</a>
            </h3>
            <p class="blog-text">
              Nvidunt ut labore et dolore magna aliqu accusam et justo duo
              dolores et ea rebu Lorem ipsum dolor sit ametrit.
            </p>
          </div>
          <div class="meta-box">
            <a href="blog-details.html">Posted By Admin</a>
            <a href="blog-details.html">9 Comments</a>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="vs-blog blog-style1">
          <div class="blog-img image-scale-hover">
            <a href="blog-details.html"><img src="./src/assets/img/blog/blog-4-4.jpg" alt="Blog Image" class="w-100" /></a>
          </div>
          <div class="blog-content">
            <div class="tags">
              <a href="blog-details.html">Natural</a>
            </div>
            <a href="blog-details.html" class="blog-date">Mar 1,2022</a>
            <h3 class="blog-title">
              <a href="blog-details.html">Lorem ipsum was purposefully designed</a>
            </h3>
            <p class="blog-text">
              Nvidunt ut labore et dolore magna aliqu accusam et justo duo
              dolores et ea rebu Lorem ipsum dolor sit ametrit.
            </p>
          </div>
          <div class="meta-box">
            <a href="blog-details.html">Posted By Admin</a>
            <a href="blog-details.html">3 Comments</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--==============================
        Blog Area
    ==============================-->
<div class="space-bottom">
  <div class="container">
    <div class="row gx-0 gy-4 justify-content-center text-center">
      <div class="col-6 col-sm-4 col-md-4 col-lg-3 brand-style1">
        <img src="./src/assets/img/brand/logo-1-1.png" alt="Barnad Image" />
      </div>
      <div class="col-6 col-sm-4 col-md-4 col-lg-3 brand-style1">
        <img src="./src/assets/img/brand/logo-1-2.png" alt="Barnad Image" />
      </div>
      <div class="col-6 col-sm-4 col-md-4 col-lg-3 brand-style1">
        <img src="./src/assets/img/brand/logo-1-3.png" alt="Barnad Image" />
      </div>
      <div class="col-6 col-sm-4 col-md-4 col-lg-3 brand-style1">
        <img src="./src/assets/img/brand/logo-1-4.png" alt="Barnad Image" />
      </div>
    </div>
  </div>
</div>
<!--==============================
    Banner Area
    ==============================-->
<section class="banner-wrap1">
  <div class="container-fluid">
    <div class="row gy-30">
      <div class="col-lg-4">
        <div class="banner-style1" data-bg-src="./src/assets/img/banner/banner-1-1.jpg">
          <div class="banner-content">
            <span class="banner-subtitle">End of season -50%</span>
            <h3 class="banner-title">100% Organic Fresh Natural Food</h3>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="banner-style1" data-bg-src="./src/assets/img/banner/banner-1-2.jpg">
          <div class="banner-content">
            <span class="banner-subtitle">End of season -50%</span>
            <h3 class="banner-title">
              New Skin Food
              <span class="fw-light">100 natural origins</span>
            </h3>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="banner-style1" data-bg-src="./src/assets/img/banner/banner-1-3.jpg">
          <div class="banner-content">
            <span class="banner-subtitle">End of season -50%</span>
            <h3 class="banner-title">Eat Organic & Healthy Food</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer Area -->
<?php
require_once('view/globle/user/footer.php');
?>
</body>

</html>