       
       <!-- Remove the container if you want to extend the Footer to full width. -->
       <div class="container my-5  pt-5">
        
        <footer class="myfooter text-center text-black">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <div class="d-flex justify-content-around">
                        
                        
                        <!-- Facebook -->
                        
                        <a class="btn btn-outline-light btn-floating m-1 ul3  " href="#!" role="button"
                        ><i class="fab fa-facebook-f"></i
                            ></a>
                            
                            <!-- Twitter -->
                            <a class="btn btn-outline-light btn-floating m-1 ul3" href="#!" role="button"
                            ><i class="fab fa-twitter"></i
                                ></a>
                                
                                <!-- Google -->
                                <a class="btn btn-outline-light btn-floating m-1 ul3" href="#!" role="button"
                                ><i class="fab fa-google"></i
                                    ></a>
                                    
                                    <!-- Instagram -->
                                    <a class="btn btn-outline-light btn-floating m-1 ul3" href="#!" role="button"
                                    ><i class="fab fa-instagram"></i
                                        ></a>
                                        
                                        <!-- Linkedin -->
                                        <a class="btn btn-outline-light btn-floating m-1 ul3" href="#!" role="button"
                                        ><i class="fab fa-linkedin-in"></i
                                            ></a>
                                            
                                            <!-- Github -->
                                            <a class="btn btn-outline-light btn-floating m-1 ul3" href="#!" role="button"
                                            ><i class="fab fa-github"></i
                                                ></a>
                                                
                                                @auth
                                                
                                                <a class="btn ul3  text-decoration-none text-white d-flex align-items-center" href="{{route('work.withus')}}">{{__('ui.lavora con noi')}}</a>
                                                
                                                @endauth
                                            </div>
                                        </section>
                                        <!-- Section: Social media -->
                                    </div>
                                    <!-- Grid container -->
                                    
                                    <!-- Copyright -->
                                    <div class="text-center p-3" style="background-color: rgba(25, 70, 191, 0.2);">
                                        © 2024 Copyright:
                                        <a class="text-white" href="https://Presto.it/">Presto.it</a>
                                    </div>
                                    <!-- Copyright -->
                                </footer>
                                
                            </div>
                            <!-- End of .container -->