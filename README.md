# NinjaVanTrackingAPI
A complete NinjaVanAPI for order tracking.
(ORDER TRACKING only, for bulk and single trackingId info)

1 - Open NinjaVanAccessTokenRequest.php, provide your client_id and client_secret before requesting/running the file

2 - Request new Token using NinjaVanAccessTokenRequest.php included.

3 - Based on your need, make an HTTP request to either NinjaVanOrderTracking.php or NinjaVanOrderTrackingBulk.php

4 - Provide a single parameter 'tracking_id' with tracking id as the value if request is made to NinjaVanOrderTracking.php
    and single parameter 'tracking_id' with array (without key) of tracking ids as the value if request is made to 
    NinjaVanOrderTrackingBulk.php.
    
5 - Basically, after you provide your client id and client secret to NinjaVanAccessTokenRequest.php, you can ignore this file and 
    straight away make your reqeust to either NinjaVanOrderTracking.php or NinjaVanOrderTrackingBulk.php
    
-------------------------------------------------------------------------------------------------------------------------------------
    
    Reference for NinjaVanOrderTrackingBulk : https://confluence.ninjavan.co/pages/viewpage.action?pageId=819251
    Reference for NinjaVanOrderTracking: 
    - Reference link    : https://ninjaorderapibeta.docs.apiary.io/#reference/0//{countrycode}/3.0/orders/get?console=1
    - Reference link 2  : https://confluence.ninjavan.co/display/NV/Order+Tracking+API


Thank you!
