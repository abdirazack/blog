<?php include_once("navabar.php");?>



        <div class="card card-lg container-fluid posts-content bordered" style="width: 100%;">
            <div class="col-lg-6">
                <div class="card mb-4">
                <div class="card-header" style="{width: 100%;}">
                  Title
                  </div>
                    <div class="card-body shadow "style="width: 100%;">
                        <div class="media mb-3">
                            <img src="./Pictures/Profiles/bp.jpg" class="d-block ui-w-40 rounded-5" style="width: 100%;" alt="">
                            <div class="media-body ml-3">
                                User: Kenneth Frazier
                                <div class="text-muted small">DateCreated: 3 days ago</div>
                            </div>
                        </div>

                        <p>
                            Description Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus
                            commodo bibendum. Vivamus laoreet blandit odio, vel finibus quam dictum ut.
                        </p>
                        <a href="javascript:void(0)" class="ui-rect ui-bg-cover"
                            style="background-image: url('/Pictures/Profiles/bp.jpg');"></a>
                    </div>

                    <div class="card-footer">
                        <a href="javascript:void(0)" class="d-inline-block text-decoration-none">
                          <i class="fas fa-heart"></i> 
                            <small class="align-middle p-3">
                                <!--Favourite-->
                            </small>
                        </a>
                        <a href="javascript:void(0)" class="d-inline-block text-decoration-none ml-3">
                        <i class="fas fa-comment align-middle text-muted "></i>
                            <small class=" p-3 align-middle"> 
                                <!--Comment Count-->
                              </small>
                        </a>
                        <a href="javascript:void(0)" class="d-inline-block text-decoration-none ml-3">
                            <i class="fas fa-eye align-middle text-muted "></i>
                            <small class="align-middle">
                              <!--View Count-->
                            </small>
                        </a>
                        <?php
                        include_once("comments.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>
