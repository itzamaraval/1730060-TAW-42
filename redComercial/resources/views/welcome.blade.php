@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="header-body text-center mt-7 mb-7">
            <div class="container d-flex flex-row bd-highlight">
                <!-- Form -->
                <form class="align-self-start row justify-content-center navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                </form>

                <!-- Page content -->
                <div class="container-fluid mt--6">
                    <div class="row">
                        <div class="col">
                            <div class="card border-0">
                                <div id="map-custom" class="map-canvas" style="height: 400px;"></div>
                                    <script>
                                        // Initialize and add the map
                                        function initMap() {
                                            // The location of Uluru
                                            var uluru = {lat: 23.729579, lng: -99.076885};
                                            // The map, centered at Uluru
                                            var map = new google.maps.Map(document.getElementById('map-custom'), {zoom: 15, center: uluru});
                                            // The marker, positioned at Uluru
                                            var marker = new google.maps.Marker({position: uluru, map: map});
                                        }
                                    </script>
                                    <script async defer
                                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhKccq_EFcpPoGMO_QVJKyESI8ev69beI&callback=initMap">
                                    </script>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>

        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>

    </div>

    <div class="container mt--10 pb-5"></div>
    
    
@endsection
