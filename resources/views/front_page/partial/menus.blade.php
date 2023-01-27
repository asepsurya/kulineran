<nav id="main-nav">
    <ul class="second-nav">
        <li><a href="home.html"><i class="feather-home mr-2"></i> Homepage</a></li>
        <li><a href="my_order.html"><i class="feather-list mr-2"></i> My Orders</a></li>
        <li>
            <a href="#"><i class="feather-edit-2 mr-2"></i> Authentication</a>
            <ul>
                <li><a href="login.html">Login</a></li>
                <li><a href="signup.html">Register</a></li>
                <li><a href="forgot_password.html">Forgot Password</a></li>
                <li><a href="verification.html">Verification</a></li>
                <li><a href="location.html">Location</a></li>
            </ul>
        </li>
        <li><a href="favorites.html"><i class="feather-heart mr-2"></i> Favorites</a></li>
        <li><a href="trending.html"><i class="feather-trending-up mr-2"></i> Trending</a></li>
        <li><a href="most_popular.html"><i class="feather-award mr-2"></i> Most Popular</a></li>
        <li><a href="restaurant.html"><i class="feather-paperclip mr-2"></i> Restaurant Detail</a></li>
        <li><a href="checkout.html"><i class="feather-list mr-2"></i> Checkout</a></li>
        <li><a href="successful.html"><i class="feather-check-circle mr-2"></i> Successful</a></li>
        <li><a href="map.html"><i class="feather-map-pin mr-2"></i> Live Map</a></li>
        <li>
            <a href="#"><i class="feather-user mr-2"></i> Profile</a>
            <ul>
                <li><a href="profile.html">Profile</a></li>
                <li><a href="favorites.html">Delivery support</a></li>
                <li><a href="contact-us.html">Contact Us</a></li>
                <li><a href="terms.html">Terms of use</a></li>
                <li><a href="privacy.html">Privacy & Policy</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="feather-alert-triangle mr-2"></i> Error</a>
            <ul>
                <li><a href="not-found.html">Not Found</a>
                    <li><a href="maintence.html"> Maintence</a>
                        <li><a href="coming-soon.html">Coming Soon</a>
            </ul>
            </li>
            <li>
                <a href="#"><i class="feather-link mr-2"></i> Navigation Link Example</a>
                <ul>
                    <li>
                        <a href="#">Link Example 1</a>
                        <ul>
                            <li>
                                <a href="#">Link Example 1.1</a>
                                <ul>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Link Example 1.2</a>
                                <ul>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                    <li><a href="#">Link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Link Example 2</a></li>
                    <li><a href="#">Link Example 3</a></li>
                    <li><a href="#">Link Example 4</a></li>
                    <li data-nav-custom-content>
                        <div class="custom-message">
                            You can add any custom content to your navigation items. This text is just an example.
                        </div>
                    </li>
                </ul>
            </li>
    </ul>
    <ul class="bottom-nav">
        <li class="email">
            <a class="text-danger" href="home.html">
                <p class="h5 m-0"><i class="feather-home text-danger"></i></p>
                Home
            </a>
        </li>
        <li class="github">
            <a href="faq.html">
                <p class="h5 m-0"><i class="feather-message-circle"></i></p>
                FAQ
            </a>
        </li>
        <li class="ko-fi">
            <a href="contact-us.html">
                <p class="h5 m-0"><i class="feather-phone"></i></p>
                Help
            </a>
        </li>
    </ul>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-0">
                <div class="osahan-filter">
                    <div class="filter">
                        <!-- SORT BY -->
                        <div class="p-3 bg-light border-bottom">
                            <h6 class="m-0">SORT BY</h6>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-radio">
                            <input type="radio" id="customRadio1f" name="location" class="custom-control-input" checked>
                            <label class="custom-control-label py-3 w-100 px-3" for="customRadio1f">Top Rated</label>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-radio">
                            <input type="radio" id="customRadio2f" name="location" class="custom-control-input">
                            <label class="custom-control-label py-3 w-100 px-3" for="customRadio2f">Nearest Me</label>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-radio">
                            <input type="radio" id="customRadio3f" name="location" class="custom-control-input">
                            <label class="custom-control-label py-3 w-100 px-3" for="customRadio3f">Cost High to Low</label>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-radio">
                            <input type="radio" id="customRadio4f" name="location" class="custom-control-input">
                            <label class="custom-control-label py-3 w-100 px-3" for="customRadio4f">Cost Low to High</label>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-radio">
                            <input type="radio" id="customRadio5f" name="location" class="custom-control-input">
                            <label class="custom-control-label py-3 w-100 px-3" for="customRadio5f">Most Popular</label>
                        </div>
                        <!-- Filter -->
                        <div class="p-3 bg-light border-bottom">
                            <h6 class="m-0">FILTER</h6>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultCheck1" checked>
                            <label class="custom-control-label py-3 w-100 px-3" for="defaultCheck1">Open Now</label>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultCheck2">
                            <label class="custom-control-label py-3 w-100 px-3" for="defaultCheck2">Credit Cards</label>
                        </div>
                        <div class="custom-control border-bottom px-0  custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultCheck3">
                            <label class="custom-control-label py-3 w-100 px-3" for="defaultCheck3">Alcohol Served</label>
                        </div>
                        <!-- Filter -->
                        <div class="p-3 bg-light border-bottom">
                            <h6 class="m-0">ADDITIONAL FILTERS</h6>
                        </div>
                        <div class="px-3 pt-3">
                            <input type="range" class="custom-range" min="0" max="100" name="minmax">
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label>Min</label>
                                    <input class="form-control" placeholder="$0" type="number">
                                </div>
                                <div class="form-group text-right col-6">
                                    <label>Max</label>
                                    <input class="form-control" placeholder="$1,0000" type="number">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer p-0 border-0">
                <div class="col-6 m-0 p-0">
                    <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                </div>
                <div class="col-6 m-0 p-0">
                    <button type="button" class="btn btn-primary btn-lg btn-block">Apply</button>
                </div>
            </div>
        </div>
    </div>
</div>