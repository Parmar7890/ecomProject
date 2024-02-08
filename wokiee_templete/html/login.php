<?php  
session_start();


 $conn = new PDO("mysql:host=localhost;dbname=db_auth", 'root', '');

 $query = $conn->prepare("SELECT * FROM tbl_user WHERE id=:id");
 $query->bindParam(':id', $_SESSION["id"]);
 $query->execute();
 $result = $query->fetchAll(PDO::FETCH_ASSOC);
	// echo "<pre>";
	// print_r($result[0]["full_name"]);	

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from softali.net/victor/wookie/html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Feb 2021 06:32:11 GMT -->
<head>
		<meta charset="utf-8">
	<title>Wokiee - Responsive HTML5 Template</title>
	<meta name="keywords" content="HTML5 Template">
	<meta name="description" content="Wokiee - Responsive HTML5 Template">
	<meta name="author" content="wokiee">
	<link rel="shortcut icon" href="favicon.ico">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> -->
	<link rel="stylesheet" href="../../../project/plugins/toastr/toastr.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="loader-wrapper">
	<div id="loader">
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
	</div>
</div>
<header id="tt-header">
	<!-- tt-mobile menu -->
	<nav class="panel-menu mobile-main-menu">
		<ul>
			<li>
				<a href="index-2.html">HOME</a>
				<ul>
					<li>
						<a href="index-2.html">HOME STYLES</a>
						<ul>
							<li><a href="index-2.html">Home — Example 1 <span class="tt-badge tt-fatured">Popular</span></a></li>
							<li><a href="index-02.html">Home — Example 2</a></li>
							<li><a href="index-03.html">Home — Example 3</a></li>
							<li><a href="index-04.html">Home — Example 4 <span class="tt-badge tt-fatured">Popular</span></a></li>
							<li><a href="index-05.html">Home — Example 5</a></li>
							<li><a href="index-06.html">Home — Example 6</a></li>
							<li><a href="index-07.html">Home — Example 7</a></li>
							<li><a href="index-08.html">Home — Example 8</a></li>
							<li><a href="index-09.html">Home — Example 9</a></li>
							<li><a href="index-10.html">Home — Example 10</a></li>
							<li><a href="index-11.html">Home — Example 11</a></li>
							<li><a href="index-12.html">Home — Example 12</a></li>
							<li><a href="index-13.html">Home — Example 13</a></li>
							<li><a href="index-14.html">Home — Example 14</a></li>
							<li><a href="index-15.html">Home — Example 15</a></li>
							<li><a href="index-16.html">Home — Example 16 <span class="tt-badge tt-fatured">Popular</span></a></li>
							<li><a href="index-17.html">Home — Example 17</a></li>
							<li><a href="index-18.html">Home — Example 18</a></li>
							<li><a href="index-19.html">Home — Example 19 <span class="tt-badge tt-new">New</span></a></li>
							<li><a href="index-20.html">Home — Example 20 <span class="tt-badge tt-new">New</span></a></li>
						</ul>
					</li>
					<li>
						<a href="index-2.html">NEW SKINS</a>
						<ul>
							<li><a href="index-skin-baby.html">Baby Shop</a></li>
							<li><a href="index-skin-beer.html">Beer Shop</a></li>
							<li><a href="index-skin-books02.html">Books Shop</a></li>
							<li><a href="index-skin-care.html">Care Shop</a></li>
							<li><a href="index-skin-cakes.html">Cakes Shop</a></li>
							<li><a href="index-skin-coffee.html">Coffee Shop</a></li>
							<li><a href="index-skin-comic-books.html">Comic Books Shop</a></li>
							<li><a href="index-skin-cookware.html">Cookware Shop</a></li>
							<li><a href="index-skin-food.html">Food Shop <span class="tt-badge tt-sale">HOT</span></a></li>
							<li><a href="index-skin-furniture02.html">Furniture Shop</a></li>
							<li><a href="index-skin-handmade.html">Handmade Shop</a></li>
							<li><a href="index-skin-oneproducts.html">One Products Shop</a></li>
							<li><a href="index-skin-oneproducts02.html">One Products Shop</a></li>
							<li><a href="index-skin-plants.html">Plants Shop <span class="tt-badge tt-new">New</span></a></li>
							<li><a href="index-skin-shirts.html">T-shirts Shop</a></li>
							<li><a href="index-skin-tea.html">Tea Shop</a></li>
							<li><a href="index-skin-tools.html">Tools Shop</a></li>
							<li><a href="index-skin-wallets.html">Wallets Shop</a></li>
							<li><a href="index-skin-watches.html">Watches Shop</a></li>
						</ul>
					</li>
					<li>
						<a href="index-2.html">HOME SKINS</a>
						<ul class="tt-megamenu-submenu">
							<li><a href="index-skin-bicycle.html">Bicycle Shop <span class="tt-badge tt-fatured">Popular</span></a></li>
							<li><a href="index-skin-bikes.html">Bikes Shop <span class="tt-badge tt-fatured">Popular</span></a></li>
							<li><a href="index-skin-books.html">Books shop</a></li>
							<li><a href="index-skin-carsshop.html">Cars Shop</a></li>
							<li><a href="index-skin-clothes.html">Clothes Shop</a></li>
							<li><a href="index-skin-cosmetics.html">Cosmetics Shop</a></li>
							<li><a href="index-skin-food-02.html">Echo Food Shop</a></li>
							<li><a href="index-skin-electronics.html">Electronics Shop</a></li>
							<li><a href="index-skin-furniture.html">Furniture Shop</a></li>
							<li><a href="index-skin-glasses.html">Glasses Shop</a></li>
							<li><a href="index-skin-gothic.html">Gothic and Rock Clothing</a></li>
							<li><a href="index-skin-jewerly.html">Jewerly Shop</a></li>
							<li><a href="index-skin-kids-clothes.html">Kids Clothes Shop</a></li>
							<li><a href="index-skin-toys.html">Kids Toys Shop</a></li>
							<li><a href="index-skin-lingerie.html">Lingerie Shop</a></li>
							<li><a href="index-skin-medical.html">Medical Shop</a></li>
							<li><a href="index-skin-oneproducts03.html">One Products Shop</a></li>
							<li><a href="index-skin-phones.html">Phones Shop</a></li>
							<li><a href="index-skin-phone-cases.html">Phone Cases Shop</a></li>
							<li><a href="index-skin-snowboards.html">Snowboards Shop	<span class="tt-badge tt-sale">HOT</span></a></li>
							<li><a href="index-skin-weapons.html">Weapons Shop</a></li>
							<li><a href="index-skin-yoga.html">Yoga Gear Shop</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li>
				<a href="listing-left-column.html">SHOP</a>
				<ul>
					<li>
						<a href="listing-left-column.html">LISTING STYLES</a>
						<ul>
							<li><a href="listing-left-column.html">Listing With Left Sidebar</a></li>
							<li><a href="listing-right-column.html">Listing With Right Sidebar</a></li>
							<li><a href="listing-not-sidebar.html">Listing Not Sidebar</a></li>
							<li><a href="listing-not-sidebar-full-width.html">Listing Not Sidebar Full Width</a></li>
							<li><a href="listing-metro.html">Listing Metro</a></li>
							<li><a href="listing-left-column-with-block.html">Listing With Custom HTML Block</a></li>
							<li><a href="listing-collection.html">Listing Collection</a></li>
							<li><a href="lookbook.html">Look Book</a></li>
						</ul>
					</li>
					<li>
						<a href="product.html">PRODUCT PAGE STYLES</a>
						<ul>
							<li><a href="product.html">Product Example 1</a></li>
							<li><a href="product-02.html">Product Example 2</a></li>
							<li><a href="product-03.html">Product Example 3</a></li>
							<li><a href="product-04.html">Product Example 4</a></li>
							<li><a href="product-variable.html">Product Layout</a></li>
							<li><a href="product-three-columns.html">Three Columns</a></li>
						</ul>
					</li>
					<li>
						<a href="product-variable.html">PRODUCT PAGE TYPES</a>
						<ul>
							<li><a href="product.html">Standard Product</a></li>
							<li><a href="product-variable.html">Variable Product</a></li>
							<li><a href="product-04.html">Grouped Product</a></li>
							<li><a href="product-label-new.html">New Product</a></li>
							<li><a href="product-label-sale.html">Sale Product</a></li>
							<li><a href="product-label-out-of-stock.html">Out Of Stock Product</a></li>
						</ul>
					</li>
					<li>
						<a href="shopping_cart_02.html">OTHER PAGES</a>
						<ul>
							<li><a href="shopping_cart_02.html">Cart</a></li>
							<li><a href="shopping_cart_01.html">Cart With Right Col</a></li>
							<li><a href="account.html">Account</a></li>
							<li><a href="account_address.html">Account Address</a></li>
							<li><a href="account_address_fields.html">Account Address Fields</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li>
				<a href="blog-listing-without-col.html">BLOG</a>
				<ul>
					<li>
						<a href="blog-listing-without-col.html">BLOG STYLE</a>
						<ul>
							<li><a href="blog-listing-without-col.html">Standard Without Sidebar</a></li>
							<li><a href="blog-listing-col-left.html">Standard With Left Sidebar</a></li>
							<li><a href="blog-listing-col-right.html">Standard With Right Sidebar</a></li>
							<li><a href="blog-masonry-col-2.html">Two Colums</a></li>
							<li><a href="blog-masonry-col-3.html">Three Colums</a></li>
							<li><a href="blog-masonry-col-3-filter.html">Three Colums With Filter</a></li>
						</ul>
					</li>
					<li>
						<a href="blog-single-post.html">POST TYPE</a>
						<ul>
							<li><a href="blog-single-post.html">Standard</a></li>
							<li><a href="blog-single-post-gallery.html">Gallery</a></li>
							<li><a href="blog-single-post-link.html">Link</a></li>
							<li><a href="blog-single-post-quote.html">Quote</a></li>
							<li><a href="blog-single-post-video.html">Video</a></li>
							<li><a href="blog-single-post-audio.html">Audio</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li>
				<a href="portfolio-col-grid-four.html">PORTFOLIO</a>
				<ul>
					<li>
						<a href="portfolio-col-grid-four.html">BOXED GRID</a>
						<ul>
							<li><a href="portfolio-col-grid-two.html">Two Colums</a></li>
							<li><a href="portfolio-col-grid-three.html">Three Colums</a></li>
							<li><a href="portfolio-col-grid-four.html">Four Colums</a></li>
							<li><a href="portfolio-col-grid-four-without-filter.html">Four Colums Without Filter</a></li>
						</ul>
					</li>
					<li>
						<a href="portfolio-col-wide-three.html">BOXED STYLES</a>
						<ul>
							<li><a href="portfolio-col-wide-two.html">Two Colums</a></li>
							<li><a href="portfolio-col-wide-three.html">Three Colums</a></li>
							<li><a href="portfolio-col-wide-four.html">Four Colums</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li>
				<a href="about.html">PAGES</a>
				<ul class="tt-megamenu-submenu">
														<li><a href="about.html">About Example 1</a>
															<ul>
																<li><a href="about.html">Link Level 1</a></li>
																<li>
																	<a href="about.html">Link Level 1</a>
																	<ul>
																		<li><a href="about.html">Link Level 2</a></li>
																		<li>
																			<a href="about.html">Link Level 2</a>
																			<ul>
																				<li><a href="about.html">Link Level 3</a></li>
																				<li><a href="about.html">Link Level 3</a></li>
																				<li><a href="about.html">Link Level 3</a></li>
																				<li>
																					<a href="about.html">Link Level 3</a>
																					<ul>
																						<li>
																							<a href="about.html">Link Level 4</a>
																							<ul>
																								<li><a href="about.html">Link Level 5</a></li>
																								<li><a href="about.html">Link Level 5</a></li>
																								<li><a href="about.html">Link Level 5</a></li>
																								<li><a href="about.html">Link Level 5</a></li>
																								<li><a href="about.html">Link Level 5</a></li>
																							</ul>
																						</li>
																						<li><a href="about.html">Link Level 4</a></li>
																					</ul>
																				</li>
																				<li><a href="about.html">Link Level 3</a></li>
																			</ul>
																		</li>
																		<li><a href="about.html">Link Level 2</a></li>
																		<li><a href="about.html">Link Level 2</a></li>
																	</ul>
																</li>
																<li><a href="about.html">Link Level 1</a></li>
																<li><a href="about.html">Link Level 1</a></li>
																<li><a href="about.html">Link Level 1</a></li>
															</ul>
														</li>
														<li><a href="about-02.html">About Example 2</a></li>
														<li><a href="contact.html">Contacts Example 1</a></li>
														<li><a href="contact-02.html">Contacts Example 2</a></li>
														<li><a href="services.html">Services</a></li>
														<li><a href="faq.html">FAQ</a></li>
														<li><a href="coming-soon.html">Coming Soon</a></li>
														<li><a href="page404.html">Page 404</a></li>
														<li><a href="typography.html">Typography</a></li>
														<li><a href="gift-cart.html">Gift Cart</a></li>
														<li>
															<a href="demo-modal.html">Demo Modal</a>
															<ul>
																<li><a href="demo-modal.html">Demo Modal Default</a></li>
																<li><a href="demo-modal-black_friday.html">Demo Black Friday <span class="tt-badge tt-new">New</span></a></li>
																<li><a href="demo-modal-cyber_monday.html">Demo Cyber Monday <span class="tt-badge tt-new">New</span></a></li>
																<li><a href="demo-modal-merry_christmas.html">Demo Merry Christmas <span class="tt-badge tt-new">New</span></a></li>
															</ul>
														</li>
														<li>
															<a href="compare.html">Compare</a>
															<ul>
																<li><a href="compare.html">Compare 01</a></li>
																<li><a href="compare-02.html">Compare 02</a></li>
															</ul>
														</li>
														<li><a href="wishlist.html">Wishlist</a></li>
														<li>
															<a href="account.html">Account</a>
															<ul>
																<li><a href="account.html">Account</a></li>
																<li><a href="account_address.html">Account Address</a></li>
																<li><a href="account_address_fields.html">Account Address Fields</a></li>
															</ul>
														</li>
														<li>
															<a href="empty-search.html">Empty</a>
															<ul>
																<li><a href="empty-cart.html">Empty Cart</a></li>
																<li><a href="empty-search.html">Empty Search</a></li>
																<li><a href="empty-wishlist.html">Empty Wishlist</a></li>
															</ul>
														</li>
													</ul>
			</li>
			<li>
				<a href="listing-left-column.html">WOMEN</a>
				<ul>
					<li>
						<a href="listing-left-column.html">TOPS</a>
						<ul>
							<li><a href="listing-left-column.html">Blouses &amp; Shirts</a></li>
							<li><a href="listing-left-column.html">Dresses <span class="tt-badge tt-new">New</span></a></li>
							<li>
								<a href="listing-left-column.html">Tops &amp; T-shirts</a>
								<ul>
									<li><a href="listing-left-column.html">Link Level 1</a></li>
									<li>
										<a href="listing-left-column.html">Link Level 1</a>
										<ul>
											<li><a href="listing-left-column.html">Link Level 2</a></li>
											<li>
												<a href="listing-left-column.html">Link Level 2</a>
												<ul>
													<li><a href="listing-left-column.html">Link Level 3</a></li>
													<li><a href="listing-left-column.html">Link Level 3</a></li>
													<li><a href="listing-left-column.html">Link Level 3</a></li>
													<li>
														<a href="listing-left-column.html">Link Level 3</a>
														<ul>
															<li>
																<a href="listing-left-column.html">Link Level 4</a>
																<ul>
																	<li><a href="listing-left-column.html">Link Level 5</a></li>
																	<li><a href="listing-left-column.html">Link Level 5</a></li>
																	<li><a href="listing-left-column.html">Link Level 5</a></li>
																	<li><a href="listing-left-column.html">Link Level 5</a></li>
																	<li><a href="listing-left-column.html">Link Level 5</a></li>
																</ul>
															</li>
															<li><a href="listing-left-column.html">Link Level 4</a></li>
															<li><a href="listing-left-column.html">Link Level 4</a></li>
															<li><a href="listing-left-column.html">Link Level 4</a></li>
															<li><a href="listing-left-column.html">Link Level 4</a></li>
														</ul>
													</li>
													<li><a href="listing-left-column.html">Link Level 3</a></li>
												</ul>
											</li>
											<li><a href="listing-left-column.html">Link Level 2</a></li>
											<li><a href="listing-left-column.html">Link Level 2</a></li>
											<li><a href="listing-left-column.html">Link Level 2</a></li>
										</ul>
									</li>
									<li><a href="listing-left-column.html">Link Level 1</a></li>
									<li><a href="listing-left-column.html">Link Level 1</a></li>
									<li><a href="listing-left-column.html">Link Level 1</a></li>
								</ul>
							</li>
							<li><a href="listing-left-column.html">Sleeveless Tops</a></li>
							<li><a href="listing-left-column.html">Sweaters</a></li>
							<li><a href="listing-left-column.html">Jackets</a></li>
							<li><a href="listing-left-column.html">Outerwear</a></li>
						</ul>
					</li>
					<li>
						<a href="listing-left-column.html">BOTTOMS</a>
						<ul>
							<li><a href="listing-left-column.html">Trousers <span class="tt-badge tt-fatured">Fatured</span></a></li>
							<li><a href="listing-left-column.html">Jeans</a></li>
							<li><a href="listing-left-column.html">Leggings</a></li>
							<li><a href="listing-left-column.html">Jumpsuit &amp; Shorts</a></li>
							<li><a href="listing-left-column.html">Skirts</a></li>
							<li><a href="listing-left-column.html">Tights</a></li>
						</ul>
					</li>
					<li>
						<a href="listing-left-column.html">ACCESSORIES</a>
						<ul>
							<li><a href="listing-left-column.html">Jewellery</a></li>
							<li><a href="listing-left-column.html">Hats</a></li>
							<li><a href="listing-left-column.html">Scarves &amp; Snoods</a></li>
							<li><a href="listing-left-column.html">Belts</a></li>
							<li><a href="listing-left-column.html">Bags</a></li>
							<li><a href="listing-left-column.html">Shoes</a></li>
							<li><a href="listing-left-column.html">Sunglasses <span class="tt-badge tt-sale">Sale 15%</span></a></li>
						</ul>
					</li>
					<li>
						<a href="listing-left-column.html">SPECIALS</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="listing-right-column.html">MEN</a>
				<ul>
					<li>
						<a href="listing-right-column.html">TOPS</a>
						<ul>
							<li><a href="listing-right-column.html">Blouses &amp; Shirts</a></li>
							<li><a href="listing-right-column.html">Dresses <span class="tt-badge tt-new">New</span></a></li>
							<li>
								<a href="listing-right-column.html">Tops &amp; T-shirts</a>
								<ul>
									<li><a href="listing-right-column.html">Link Level 1</a></li>
									<li>
										<a href="listing-right-column.html">Link Level 1</a>
										<ul>
											<li><a href="listing-right-column.html">Link Level 2</a></li>
											<li>
												<a href="listing-right-column.html">Link Level 2</a>
												<ul>
													<li><a href="listing-right-column.html">Link Level 3</a></li>
													<li><a href="listing-right-column.html">Link Level 3</a></li>
													<li><a href="listing-right-column.html">Link Level 3</a></li>
													<li>
														<a href="listing-right-column.html">Link Level 3</a>
														<ul>
															<li>
																<a href="listing-right-column.html">Link Level 4</a>
																<ul>
																	<li><a href="listing-right-column.html">Link Level 5</a></li>
																	<li><a href="listing-right-column.html">Link Level 5</a></li>
																	<li><a href="listing-right-column.html">Link Level 5</a></li>
																	<li><a href="listing-right-column.html">Link Level 5</a></li>
																	<li><a href="listing-right-column.html">Link Level 5</a></li>
																</ul>
															</li>
															<li><a href="listing-right-column.html">Link Level 4</a></li>
															<li><a href="listing-right-column.html">Link Level 4</a></li>
															<li><a href="listing-right-column.html">Link Level 4</a></li>
															<li><a href="listing-right-column.html">Link Level 4</a></li>
														</ul>
													</li>
													<li><a href="listing-right-column.html">Link Level 3</a></li>
												</ul>
											</li>
											<li><a href="listing-right-column.html">Link Level 2</a></li>
											<li><a href="listing-right-column.html">Link Level 2</a></li>
											<li><a href="listing-right-column.html">Link Level 2</a></li>
										</ul>
									</li>
									<li><a href="listing-right-column.html">Link Level 1</a></li>
									<li><a href="listing-right-column.html">Link Level 1</a></li>
									<li><a href="listing-right-column.html">Link Level 1</a></li>
								</ul>
							</li>
							<li><a href="listing-right-column.html">Sleeveless Tops</a></li>
							<li><a href="listing-right-column.html">Sweaters</a></li>
							<li><a href="listing-right-column.html">Jackets</a></li>
							<li><a href="listing-right-column.html">Outerwear</a></li>
						</ul>
					</li>
					<li>
						<a href="listing-right-column.html">BOTTOMS</a>
						<ul>
							<li><a href="listing-right-column.html">Trousers <span class="tt-badge tt-fatured">Fatured</span></a></li>
							<li><a href="listing-right-column.html">Jeans</a></li>
							<li><a href="listing-right-column.html">Leggings</a></li>
							<li><a href="listing-right-column.html">Jumpsuit &amp; shorts</a></li>
							<li><a href="listing-right-column.html">Skirts</a></li>
							<li><a href="listing-right-column.html">Tights</a></li>
						</ul>
					</li>
					<li>
						<a href="listing-right-column.html">ACCESSORIES</a>
						<ul>
							<li><a href="listing-right-column.html">Jewellery</a></li>
							<li><a href="listing-right-column.html">Hats</a></li>
							<li><a href="listing-right-column.html">Scarves &amp; Snoods</a></li>
							<li><a href="listing-right-column.html">Belts</a></li>
							<li><a href="listing-right-column.html">Bags</a></li>
							<li><a href="listing-right-column.html">Shoes</a></li>
							<li><a href="listing-right-column.html">Sunglasses <span class="tt-badge tt-sale">Sale 15%</span></a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li><a href="index-rtl.html">RTL</a></li>
		</ul>
		<div class="mm-navbtn-names">
			<div class="mm-closebtn">Close</div>
			<div class="mm-backbtn">Back</div>
		</div>
	</nav>
	<!-- tt-mobile-header -->
	<div class="tt-mobile-header">
		<div class="container-fluid">
			<div class="tt-header-row">
				<div class="tt-mobile-parent-menu">
					<div class="tt-menu-toggle" id="js-menu-toggle">
						<i class="icon-03"></i>
					</div>
				</div>
				<!-- search -->
				<div class="tt-mobile-parent-search tt-parent-box"></div>
				<!-- /search -->
				<!-- cart -->
				<div class="tt-mobile-parent-cart tt-parent-box"></div>
				<!-- /cart -->
				<!-- account -->
				<div class="tt-mobile-parent-account tt-parent-box"></div>
				<!-- /account -->
				<!-- currency -->
				<div class="tt-mobile-parent-multi tt-parent-box"></div>
				<!-- /currency -->
			</div>
		</div>
		<div class="container-fluid tt-top-line">
			<div class="row">
				<div class="tt-logo-container">
					<!-- mobile logo -->
					<a class="tt-logo tt-logo-alignment" href="index-2.html"><img src="images/custom/logo.png" alt=""></a>
					<!-- /mobile logo -->
				</div>
			</div>
		</div>
	</div>
	<!-- tt-desktop-header -->
	<div class="tt-desktop-header">
		<div class="container">
			<div class="tt-header-holder">
				<div class="tt-col-obj tt-obj-logo">
					<!-- logo -->
					<a class="tt-logo tt-logo-alignment" href="index-2.html"><img src="images/custom/logo.png" alt=""></a>
					<!-- /logo -->
				</div>
				<div class="tt-col-obj tt-obj-menu">
					<!-- tt-menu -->
					<div class="tt-desctop-parent-menu tt-parent-box">
						<div class="tt-desctop-menu tt-hover-03" id="js-include-desktop-menu"></div>
					</div>
					<!-- /tt-menu -->
				</div>
				<div class="tt-col-obj tt-obj-options obj-move-right">
					<!-- tt-search -->
					<div class="tt-desctop-parent-search tt-parent-box">
						<div class="tt-search tt-dropdown-obj">
							<button class="tt-dropdown-toggle" data-tooltip="Search" data-tposition="bottom">
								<i class="icon-f-85"></i>
							</button>
							<div class="tt-dropdown-menu">
								<div class="container">
									<form>
										<div class="tt-col">
											<input type="text" class="tt-search-input" placeholder="Search Products...">
											<button class="tt-btn-search" type="submit"></button>
										</div>
										<div class="tt-col">
											<button class="tt-btn-close icon-g-80"></button>
										</div>
										<div class="tt-info-text">
											What are you Looking for?
										</div>
										<div class="search-results"></div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /tt-search -->
					<!-- tt-cart -->
					<div class="tt-desctop-parent-cart tt-parent-box">
						<div class="tt-cart tt-dropdown-obj" data-tooltip="Cart" data-tposition="bottom">
							<button class="tt-dropdown-toggle">
								<i class="icon-f-39"></i>
								<span class="tt-badge-cart">3</span>
							</button>
							<div class="tt-dropdown-menu">
								<div class="tt-mobile-add">
									<h6 class="tt-title">SHOPPING CART</h6>
									<button class="tt-close">Close</button>
								</div>
								<div class="tt-dropdown-inner">
									<div class="tt-cart-layout">
										<!-- layout emty cart -->
										<!-- <a href="empty-cart.html" class="tt-cart-empty">
											<i class="icon-f-39"></i>
											<p>No Products in the Cart</p>
										</a> -->
										<div class="tt-cart-content">
											<div class="tt-cart-list">
												<div class="tt-item">
													<a href="product.html">
														<div class="tt-item-img">
															<img src="images/loader.svg" data-src="images/product/product-01.jpg" alt="">
														</div>
														<div class="tt-item-descriptions">
															<h2 class="tt-title">Flared Shift Dress</h2>
															<ul class="tt-add-info">
																<li>Yellow, Material 2, Size 58,</li>
																<li>Vendor: Addidas</li>
															</ul>
															<div class="tt-quantity">1 X</div> <div class="tt-price">$12</div>
														</div>
													</a>
													<div class="tt-item-close">
														<a href="#" class="tt-btn-close"></a>
													</div>
												</div>
												<div class="tt-item">
													<a href="product.html">
														<div class="tt-item-img">
															<img src="images/loader.svg" data-src="images/product/product-02.jpg" alt="">
														</div>
														<div class="tt-item-descriptions">
															<h2 class="tt-title">Flared Shift Dress</h2>
															<ul class="tt-add-info">
																<li>Yellow, Material 2, Size 58,</li>
																<li>Vendor: Addidas</li>
															</ul>
															<div class="tt-quantity">1 X</div> <div class="tt-price">$18</div>
														</div>
													</a>
													<div class="tt-item-close">
														<a href="#" class="tt-btn-close"></a>
													</div>
												</div>
											</div>
											<div class="tt-cart-total-row">
												<div class="tt-cart-total-title">SUBTOTAL:</div>
												<div class="tt-cart-total-price">$324</div>
											</div>
											<div class="tt-cart-btn">
												<div class="tt-item">
													<a href="#" class="btn">PROCEED TO CHECKOUT</a>
												</div>
												<div class="tt-item">
													<a href="shopping_cart_02.html" class="btn-link-02 tt-hidden-mobile">View Cart</a>
													<a href="shopping_cart_02.html" class="btn btn-border tt-hidden-desctope">VIEW CART</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /tt-cart -->
					<!-- tt-account -->
					<div class="tt-desctop-parent-account tt-parent-box">
						<div class="tt-account tt-dropdown-obj">
							<button class="tt-dropdown-toggle"  data-tooltip="My Account" data-tposition="bottom"><i class="icon-f-94"></i></button>
							<div class="tt-dropdown-menu">
								<div class="tt-mobile-add">
									<button class="tt-close">Close</button>
								</div>
								<div class="tt-dropdown-inner">
									<ul>
									    <li><a href="login.html"><i class="icon-f-94"></i>Account</a></li>
									    <li><a href="wishlist.html"><i class="icon-n-072"></i>Wishlist</a></li>
									    <li><a href="compare.html"><i class="icon-n-08"></i>Compare</a></li>
									    <li><a href="page404.html"><i class="icon-f-68"></i>Check Out</a></li>
									    <li><a href="login.html"><i class="icon-f-76"></i>Sign In</a></li>
									    <li><a href="page404.html"><i class="icon-f-77"></i>Sign Out</a></li>
									    <li><a href="create-account.html"><i class="icon-f-94"></i>Register</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /tt-account -->
					<!-- tt-langue and tt-currency -->
					<div class="tt-desctop-parent-multi tt-parent-box">
						<div class="tt-multi-obj tt-dropdown-obj">
							<button class="tt-dropdown-toggle" data-tooltip="Settings" data-tposition="bottom"><i class="icon-f-79"></i></button>
							<div class="tt-dropdown-menu">
								<div class="tt-mobile-add">
									<button class="tt-close">Close</button>
								</div>
								<div class="tt-dropdown-inner">
									<ul>
										<li class="active"><a href="#">English</a></li>
										<li><a href="#">Deutsch</a></li>
										<li><a href="#">Español</a></li>
										<li><a href="#">Français</a></li>
									</ul>
									<ul>
										<li class="active"><a href="#"><i class="icon-h-59"></i>USD - US Dollar</a></li>
										<li><a href="#"><i class="icon-h-60"></i>EUR - Euro</a></li>
										<li><a href="#"><i class="icon-h-61"></i>GBP - British Pound Sterling</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /tt-langue and tt-currency -->
				</div>
			</div>
		</div>
	</div>
	<!-- stuck nav -->
	<div class="tt-stuck-nav" id="js-tt-stuck-nav">
		<div class="container">
			<div class="tt-header-row ">
				<div class="tt-stuck-parent-menu"></div>
				<div class="tt-stuck-parent-search tt-parent-box"></div>
				<div class="tt-stuck-parent-cart tt-parent-box"></div>
				<div class="tt-stuck-parent-account tt-parent-box"></div>
				<div class="tt-stuck-parent-multi tt-parent-box"></div>
			</div>
		</div>
	</div>
</header>
<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="index-2.html">Home</a></li>
			<li>Register</li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder">EDIT PROFILE</h1>
			<div class="tt-login-form">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						
				
						<div class="tt-item">
							<!-- <h2 class="tt-title">LOGIN</h2> -->
							
							<div class="form-default form-top">
								<form id="userEdit" method="post" novalidate="novalidate">
									<div class="form-group">
										<label for="loginInputName">name</label>
										<input type="text" name="name" value="<?php echo $result[0]["full_name"]; ?>" class="form-control" id="Name" placeholder="Enter name">
									</div>
									<div class="form-group">
										<label for="loginInputEmail">phone</label>
										<input type="text" name="phone" value="<?php echo $result[0]["phone"]; ?>"class="form-control" id="phone" placeholder="Enter Phone">
									</div>
									<div class="form-group">
										<label for="loginInputEmail">email</label>
										<input type="text" name="email" value="<?php echo $result[0]["email"] ?>" class="form-control" id="email" placeholder="Enter Email">
									</div>
									<div class="row">
										<div class="col-auto mr-auto">
											<div class="form-group">
												<button id="submit" class="btn btn-border" type="submit">SUBMIT</button>
											</div>
										</div>
										<div class="col-auto align-self-end">
											<div class="form-group">
												
											</div>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<footer id="tt-footer">
	<div class="tt-footer-default tt-color-scheme-02">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-9">
					<div class="tt-newsletter-layout-01">
						<div class="tt-newsletter">
							<div class="tt-mobile-collapse">
								<h4 class="tt-collapse-title">
									BE IN TOUCH WITH US:
								</h4>
								<div class="tt-collapse-content">
									<form id="newsletterform" class="form-inline form-default" method="post" novalidate="novalidate" action="#">
										<div class="form-group">
											<input type="text" name="email" class="form-control" placeholder="Enter your e-mail">
											<button type="submit" class="btn">JOIN US</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-auto">
					<ul class="tt-social-icon">
						<li><a class="icon-g-64" target="_blank" href="http://www.facebook.com/"></a></li>
						<li><a class="icon-h-58" target="_blank" href="http://www.facebook.com/"></a></li>
						<li><a class="icon-g-66" target="_blank" href="http://www.twitter.com/"></a></li>
						<li><a class="icon-g-67" target="_blank" href="http://www.google.com/"></a></li>
						<li><a class="icon-g-70" target="_blank" href="https://instagram.com/"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="tt-footer-col tt-color-scheme-01">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-2 col-xl-3">
					<div class="tt-mobile-collapse">
						<h4 class="tt-collapse-title">
							CATEGORIES
						</h4>
						<div class="tt-collapse-content">
							<ul class="tt-list">
								<li><a href="listing-collection.html">Women</a></li>
								<li><a href="listing-collection.html">Men</a></li>
								<li><a href="listing-collection.html">Accessories</a></li>
								<li><a href="listing-collection.html">Shoes</a></li>
								<li><a href="listing-collection.html">New Arrivals</a></li>
								<li><a href="listing-collection.html">Clearence</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-2 col-xl-3">
					<div class="tt-mobile-collapse">
						<h4 class="tt-collapse-title">
							MY ACCOUNT
						</h4>
						<div class="tt-collapse-content">
							<ul class="tt-list">
								<li><a href="account_order.html">Orders</a></li>
								<li><a href="page404.html">Compare</a></li>
								<li><a href="page404.html">Wishlist</a></li>
								<li><a href="login.html">Log In</a></li>
								<li><a href="create-account.html">Register</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="tt-mobile-collapse">
						<h4 class="tt-collapse-title">
							ABOUT
						</h4>
						<div class="tt-collapse-content">
							<p>
								Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, seddo eiusmod tempor incididunt ut labore etdolore.
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="tt-newsletter">
						<div class="tt-mobile-collapse">
							<h4 class="tt-collapse-title">
								CONTACTS
							</h4>
							<div class="tt-collapse-content">
								<address>
									<p><span>Address:</span> 2548 Broaddus Maple Court Avenue, Madisonville KY 4783, United States of America</p>
									<p><span>Phone:</span> +777 2345 7885;  +777 2345 7886</p>
									<p><span>Hours:</span> 7 Days a week from 10 am to 6 pm</p>
									<p><span>E-mail:</span> <a href="mailto:info@mydomain.com">info@mydomain.com</a></p>
								</address>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tt-footer-custom">
		<div class="container">
			<div class="tt-row">
				<div class="tt-col-left">
					<div class="tt-col-item tt-logo-col">
						<!-- logo -->
						<a class="tt-logo tt-logo-alignment" href="index-2.html">
							<img  src="images/loader.svg"  data-src="images/custom/logo.png" alt="">
						</a>
						<!-- /logo -->
					</div>
					<div class="tt-col-item">
						<!-- copyright -->
						<div class="tt-box-copyright">
							&copy; Wokiee 2020. All Rights Reserved
						</div>
						<!-- /copyright -->
					</div>
				</div>
				<div class="tt-col-right">
					<div class="tt-col-item">
						<!-- payment-list -->
						<ul class="tt-payment-list">
							<li><a href="page404.html"><span class="icon-Stripe"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span>
			                </span></a></li>
							<li><a href="page404.html"> <span class="icon-paypal-2">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span>
			                </span></a></li>
							<li><a href="page404.html"><span class="icon-visa">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
			                </span></a></li>
							<li><a href="page404.html"><span class="icon-mastercard">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span>
			                </span></a></li>
							<li><a href="page404.html"><span class="icon-discover">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span>
			                </span></a></li>
							<li><a href="page404.html"><span class="icon-american-express">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span>
			                </span></a></li>
						</ul>
						<!-- /payment-list -->
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<div class="tt-promo-fixed" id="js-tt-promo-fixed">
	<button class="tt-btn-close"></button>
	<div class="tt-img">
		<a href="product.html"><img src="images/loader.svg" data-src="images/product/product-14.jpg" alt=""></a>
	</div>
	<div class="tt-description">
		<div class="tt-box-top">
			<p>
				Someone purchsed a
			</p>
			<p>
				<a href="#">
					Lorem ipsum dolor sit amet conse ctetur adipisicing elit...
				</a>
			</p>
		</div>
		<div class="tt-info">
			14 Minutes ago from  New York, USA
		</div>
	</div>
</div>
<div id="tt-boxedbutton">
	<a href="https://www.youtube.com/playlist?list=PLjvK4DAxOmmVqXYUbOFUTqdl0b7pg7gN1" target="_blank" class="rtlbutton external-link">
		<div class="box-btn">
			<i class="icon-g-54"></i>
		</div>
		<div class="box-description">
			Presentation&nbsp;<strong>VIDEO</strong>
		</div>
		<div class="box-disable">
			Disable
		</div>
	</a>
	<div class="rtlbutton boxbutton-js">
		<div class="box-btn">
			BOX
		</div>
		<div class="box-description">
			Use demo with&nbsp;<strong>BOX</strong>
		</div>
		<div class="box-disable">
			Disable
		</div>
	</div>
	<div class="rtlbutton rtlbutton-js">
		<div class="box-btn">
			RTL
		</div>
		<div class="box-description">
			Use demo with&nbsp;<strong>RTL</strong>
		</div>
		<div class="box-disable">
			Disable
		</div>
	</div>
	<div class="rtlbutton-color">
		<div class="box-btn"><img src="images/custom/rtlbutton-color.png" alt=""></div>
		<div class="box-description">
			<span class="box-title">COLOR SCHEME</span>
			<ul>
				<li class="active"><a href="#" class="colorswatch1"></a></li>
				<li data-color="02"><a href="#" class="colorswatch2"></a></li>
				<li data-color="03"><a href="#" class="colorswatch3"></a></li>
				<li data-color="04"><a href="#" class="colorswatch4"></a></li>
				<li data-color="05"><a href="#" class="colorswatch5"></a></li>
				<li data-color="06"><a href="#" class="colorswatch6"></a></li>
				<li data-color="07"><a href="#" class="colorswatch7"></a></li>
				<li data-color="08"><a href="#" class="colorswatch8"></a></li>
			</ul>
		</div>
	</div>
</div>
<!-- modal (AddToCartProduct) -->
<div class="modal  fade"  id="modalAddToCartProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			</div>
			<div class="modal-body">
				<div class="tt-modal-addtocart mobile">
					<div class="tt-modal-messages">
						<i class="icon-f-68"></i> Added to cart successfully!
					</div>
					<a href="#" class="btn-link btn-close-popup">CONTINUE SHOPPING</a>
			        <a href="shopping_cart_02.html" class="btn-link">VIEW CART</a>
			        <a href="page404.html" class="btn-link">PROCEED TO CHECKOUT</a>
				</div>
				<div class="tt-modal-addtocart desctope">
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="tt-modal-messages">
								<i class="icon-f-68"></i> Added to cart successfully!
							</div>
							<div class="tt-modal-product">
								<div class="tt-img">
									<img src="images/loader.svg" data-src="images/product/product-01.jpg" alt="">
								</div>
								<h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
								<div class="tt-qty">
									QTY: <span>1</span>
								</div>
							</div>
							<div class="tt-product-total">
								<div class="tt-total">
									TOTAL: <span class="tt-price">$324</span>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<a href="#" class="tt-cart-total">
								There are 1 items in your cart
								<div class="tt-total">
									TOTAL: <span class="tt-price">$324</span>
								</div>
							</a>
							<a href="#" class="btn btn-border btn-close-popup">CONTINUE SHOPPING</a>
							<a href="shopping_cart_02.html" class="btn btn-border">VIEW CART</a>
							<a href="#" class="btn">PROCEED TO CHECKOUT</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- modal (quickViewModal) -->
<div class="modal  fade"  id="ModalquickView" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			</div>
			<div class="modal-body">
				<div class="tt-modal-quickview desctope">
					<div class="row">
						<div class="col-12 col-md-5 col-lg-6">
							<div class="tt-mobile-product-slider arrow-location-center">
								<div><img src="#" data-lazy="images/product/product-01.jpg" alt=""></div>
								<div><img src="#" data-lazy="images/product/product-01-02.jpg" alt=""></div>
								<div><img src="#" data-lazy="images/product/product-01-03.jpg" alt=""></div>
								<div><img src="#" data-lazy="images/product/product-01-04.jpg" alt=""></div>
								<!--
								//video insertion template
								<div>
									<div class="tt-video-block">
										<a href="#" class="link-video"></a>
										<video class="movie" src="video/video.mp4" poster="video/video_img.jpg"></video>
									</div>
								</div> -->
							</div>
						</div>
						<div class="col-12 col-md-7 col-lg-6">
							<div class="tt-product-single-info">
								<div class="tt-add-info">
									<ul>
										<li><span>SKU:</span> 001</li>
										<li><span>Availability:</span> 40 in Stock</li>
									</ul>
								</div>
								<h2 class="tt-title">Cotton Blend Fleece Hoodie</h2>
								<div class="tt-price">
									<span class="new-price">$29</span>
									<span class="old-price"></span>
								</div>
								<div class="tt-review">
									<div class="tt-rating">
										<i class="icon-star"></i>
										<i class="icon-star"></i>
										<i class="icon-star"></i>
										<i class="icon-star-half"></i>
										<i class="icon-star-empty"></i>
									</div>
									<a href="#">(1 Customer Review)</a>
								</div>
								<div class="tt-wrapper">
									Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
								</div>
								<div class="tt-swatches-container">
									<div class="tt-wrapper">
										<div class="tt-title-options">SIZE</div>
										<form class="form-default">
											<div class="form-group">
												<select class="form-control">
													<option>21</option>
													<option>25</option>
													<option>36</option>
												</select>
											</div>
										</form>
									</div>
									<div class="tt-wrapper">
										<div class="tt-title-options">COLOR</div>
										<form class="form-default">
											<div class="form-group">
												<select class="form-control">
													<option>Red</option>
													<option>Green</option>
													<option>Brown</option>
												</select>
											</div>
										</form>
									</div>
									<div class="tt-wrapper">
										<div class="tt-title-options">TEXTURE:</div>
										<ul class="tt-options-swatch options-large">
											<li><a class="options-color" href="#">
												<span class="swatch-img">
													<img src="images/loader.svg" data-src="images/custom/texture-img-01.jpg" alt="">
												</span>
												<span class="swatch-label color-black"></span>
											</a></li>
											<li class="active"><a class="options-color" href="#">
												<span class="swatch-img">
													<img src="images/loader.svg" data-src="images/custom/texture-img-02.jpg" alt="">
												</span>
												<span class="swatch-label color-black"></span>
											</a></li>
											<li><a class="options-color" href="#">
												<span class="swatch-img">
													<img src="images/loader.svg" data-src="images/custom/texture-img-03.jpg" alt="">
												</span>
												<span class="swatch-label color-black"></span>
											</a></li>
											<li><a class="options-color" href="#">
												<span class="swatch-img">
													<img src="images/loader.svg" data-src="images/custom/texture-img-04.jpg" alt="">
												</span>
												<span class="swatch-label color-black"></span>
											</a></li>
											<li><a class="options-color" href="#">
												<span class="swatch-img">
													<img src="images/loader.svg" data-src="images/custom/texture-img-05.jpg" alt="">
												</span>
												<span class="swatch-label color-black"></span>
											</a></li>
										</ul>
									</div>
								</div>
								<div class="tt-wrapper">
									<div class="tt-row-custom-01">
										<div class="col-item">
											<div class="tt-input-counter style-01">
												<span class="minus-btn"></span>
												<input type="text" value="1" size="5">
												<span class="plus-btn"></span>
											</div>
										</div>
										<div class="col-item">
											<a href="#" class="btn btn-lg"><i class="icon-f-39"></i>ADD TO CART</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- modalVideoProduct -->
<div class="modal fade"  id="modalVideoProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-video">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			</div>
			<div class="modal-body">
				<div class="modal-video-content">

				</div>
			</div>
		</div>
	</div>
</div>
<!-- modal (ModalSubsribeGood) -->
<div class="modal  fade"  id="ModalSubsribeGood" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xs">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			</div>
			<div class="modal-body">
				<div class="tt-modal-subsribe-good">
					<i class="icon-f-68"></i> You have successfully signed!
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../../../project/plugins/jquery/jquery.min.js"></script>
<script src="../../../../ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="external/jquery/jquery.min.js"><\/script>')</script>
<script defer src="js/bundle.js"></script>
<script src="../../../project/plugins/toastr/toastr.min.js"></script>

<!-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> -->

<a href="#" class="tt-back-to-top" id="js-back-to-top">BACK TO TOP</a>
</body>

<script>
	$(document).ready(function() {
		$("#submit").on('click',function(e) {
			e.preventDefault();
			var frm = $("#userEdit").serializeArray();
			console.log(frm);
			$.ajax({
				type: "POST",
				url : "../../../project/backend/userController.php",
				data:JSON.stringify({
              action:'edituser',
              data:frm,
            }),
            dataType:"json",
			success: function (response) {
				console.log(response);
				if (response["status"] == 202) {
    toastr.success(response["message"]);
    setTimeout(function() {
        window.location.href = "./index.php";
    }, 1000); // 2000 milliseconds (2 seconds) delay before redirection
} else {
    toastr.error(response["message"]);
}


            },
			})
		})
	})
</script>
</html>