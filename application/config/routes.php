<?php defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'home';
$route['404_override'] = 'home/error_404';
$route['translate_uri_dashes'] = TRUE;


// admin routes
$route[ADMIN."/forgot-password"] = ADMIN."/login/forgot_password";
$route[ADMIN."/check-otp"] = ADMIN."/login/check_otp";
$route[ADMIN."/change-password"] = ADMIN."/login/change_password";
$route[ADMIN."/dashboard"] = ADMIN."/home";

// front routes

$route["about"] = "home/about";
$route["contact"] = "home/contact";
$route["shop"] = "home/shop";
$route["cart"] = "home/cart";
$route["checkout"]['get'] = "home/checkout";
$route["checkout"]['post'] = "home/checkout_post";
$route["login"] = "home/login";
$route["register"] = "home/register";
$route["shipping-policy"] = "home/shipping_policy";
$route["terms-and-conditions"] = "home/terms_and_conditions";
$route["special-features"] = "home/special_features";
$route["why-himabhi"] = "home/why_himabhi";
$route["add-to-wish"]['post'] = "home/add_to_wish";
$route["delete-cart"]['post'] = "home/delete_cart";
$route["delete-wish"]['post'] = "user/delete_wish";
$route["my-orders"] = "user";
// $route["update-quantities"]['post'] = "home/update_quantities";

if(strpos(PATH_INFOS, ADMIN) === false)
{
    $route["(:any)"] = "home/product/$1";
}