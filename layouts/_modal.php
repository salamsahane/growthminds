<?php

use App\Models\QueryBuilder;

$query = (new QueryBuilder)->from('programs');
$programs = $query->fetchAll();
?>
<!-- Modal -->
<div class="modal courses-modal" id="courses" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-i8-plus bg-body pr-0">
                        <div class="py-16pt pl-16pt menu">
                            <ul class="nav flex-column">
                                <?php foreach($programs as $i => $program): ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?= $i == 0 ? 'active' : ''; ?>" href="#<?= strtolower($program['program_name']) ?>" data-toggle="tab"><?= $program['program_name'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-6 col-i8-plus-auto tab-content">

                        <?php foreach($programs as $i => $program): ?>
                            <?php 
                                $query = (new QueryBuilder)
                                                ->from("fields")
                                                ->where("program_id = :program_id")
                                                ->setParam('program_id', $program['program_id']);
                                $fields = $query->fetchAll();
                            ?>
                            <div id="<?= strtolower($program['program_name']) ?>" class="tab-pane <?= $i == 0 ? 'show active' : '' ?>">
                                <div class="row no-gutters">
                                    <div class="col-md-6 p-0">
                                        <div class="p-24pt d-flex h-100 flex-column">
                                            <div class="flex">
                                                <h5 class="text-black-100">Specialties</h5>
                                                    <ul class="nav flex-column mb-24pt">
                                                    <?php if($query->count('field_id') > 0): ?>
                                                        <?php foreach($fields as $field): ?>
                                                        <?php
                                                            $sql = (new QueryBuilder)
                                                                        ->from("specialties")
                                                                        ->where("field_id = :field_id")
                                                                        ->setParam("field_id", $field['field_id'])
                                                                        ->orderBy('specialty_name', "asc");
                                                            $specialties = $sql->fetchAll();
                                                        ?>
                                                        <?php if($sql->count('specialty_id') > 0): ?>
                                                        <?php foreach($specialties as $specialty): ?>
                                                            <li class="nav-item">
                                                                <a class="nav-link px-0" href="/specialty/specialty-details/<?= $specialty['specialty_id'] ?>"><?= $specialty['specialty_name'] ?></a>
                                                            </li>  
                                                        <?php endforeach; ?>
                                                        <?php endif ?>
                                                    <?php endforeach; ?>
                                                        <?php endif; ?>
                                                </ul>
                                            </div>
                                            <div>
                                                <a href="/specialty/specialties" class="btn btn-block text-center btn-secondary">All Specialties</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!-- <div id="courses-development" class="tab-pane">
                            <div class="row no-gutters">
                                <div class="col-md-6 p-0">
                                    <div class="p-24pt d-flex h-100 flex-column">
                                        <div class="flex">
                                            <h5 class="text-black-100">Courses</h5>
                                            <ul class="nav flex-column mb-24pt">

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">Web Development</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">JavaScript</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">HTML</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">CSS</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">WordPress</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">PHP</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">iOS Development</a>
                                                </li>

                                            </ul>
                                        </div>
                                        <div>
                                            <a href="library.html"
                                                class="btn btn-block text-center btn-secondary">Library</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="p-24pt d-flex h-100 flex-column">
                                        <div class="flex">
                                            <h5 class="text-black-100">Learning Paths</h5>
                                            <div class="mb-16pt">
                                                <a href="path.html" class="media text-black-100">
                                                    <img src="assets/images/paths/angular_40x40%402x.png" width="40"
                                                        height="40" alt="Angular" class="media-left rounded">
                                                    <span class="media-body">
                                                        <span class="card-title d-block mb-0">Angular</span>
                                                        <span class="text-muted text-black-70 d-flex lh-1">24
                                                            courses</span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-16pt">
                                                <a href="path.html" class="media text-black-100">
                                                    <img src="assets/images/paths/swift_40x40%402x.png" width="40"
                                                        height="40" alt="Swift" class="media-left rounded">
                                                    <span class="media-body">
                                                        <span class="card-title d-block mb-0">Swift</span>
                                                        <span class="text-muted text-black-70 d-flex lh-1">22
                                                            courses</span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-16pt">
                                                <a href="path.html" class="media text-black-100">
                                                    <img src="assets/images/paths/react_40x40%402x.png" width="40"
                                                        height="40" alt="React Native" class="media-left rounded">
                                                    <span class="media-body">
                                                        <span class="card-title d-block mb-0">React Native</span>
                                                        <span class="text-muted text-black-70 d-flex lh-1">18
                                                            courses</span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-16pt">
                                                <a href="path.html" class="media text-black-100">
                                                    <img src="assets/images/paths/wordpress_40x40%402x.png" width="40"
                                                        height="40" alt="WordPress" class="media-left rounded">
                                                    <span class="media-body">
                                                        <span class="card-title d-block mb-0">WordPress</span>
                                                        <span class="text-muted text-black-70 d-flex lh-1">13
                                                            courses</span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-24pt">
                                                <a href="path.html" class="media text-black-100">
                                                    <img src="assets/images/paths/devops_40x40%402x.png" width="40"
                                                        height="40" alt="Development Tools" class="media-left rounded">
                                                    <span class="media-body">
                                                        <span class="card-title d-block mb-0">Development Tools</span>
                                                        <span class="text-muted text-black-70 d-flex lh-1">5
                                                            courses</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="paths.html"
                                                class="btn btn-block text-center btn-outline-secondary">Learning
                                                Paths</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="courses-design" class="tab-pane">
                            <div class="row no-gutters">
                                <div class="col-md-6 p-0">
                                    <div class="p-24pt d-flex h-100 flex-column">
                                        <div class="flex">
                                            <h5 class="text-black-100">Courses</h5>
                                            <ul class="nav flex-column mb-24pt">

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">Illustration</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">Design Skills</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">Design Techniques</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">Page Layout</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">Projects</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">Drawing</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link px-0" href="library.html">Typography</a>
                                                </li>

                                            </ul>
                                        </div>
                                        <div>
                                            <a href="library.html"
                                                class="btn btn-block text-center btn-secondary">Library</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0">
                                    <div class="p-24pt d-flex h-100 flex-column">
                                        <div class="flex">
                                            <h5 class="text-black-100">Learning Paths</h5>
                                            <div class="mb-16pt">
                                                <a href="path.html" class="media text-black-100">
                                                    <img src="assets/images/paths/angular_40x40%402x.png" width="40"
                                                        height="40" alt="Angular" class="media-left rounded">
                                                    <span class="media-body">
                                                        <span class="card-title d-block mb-0">Angular</span>
                                                        <span class="text-muted text-black-70 d-flex lh-1">24
                                                            courses</span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-16pt">
                                                <a href="path.html" class="media text-black-100">
                                                    <img src="assets/images/paths/swift_40x40%402x.png" width="40"
                                                        height="40" alt="Swift" class="media-left rounded">
                                                    <span class="media-body">
                                                        <span class="card-title d-block mb-0">Swift</span>
                                                        <span class="text-muted text-black-70 d-flex lh-1">22
                                                            courses</span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-16pt">
                                                <a href="path.html" class="media text-black-100">
                                                    <img src="assets/images/paths/react_40x40%402x.png" width="40"
                                                        height="40" alt="React Native" class="media-left rounded">
                                                    <span class="media-body">
                                                        <span class="card-title d-block mb-0">React Native</span>
                                                        <span class="text-muted text-black-70 d-flex lh-1">18
                                                            courses</span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-16pt">
                                                <a href="path.html" class="media text-black-100">
                                                    <img src="assets/images/paths/wordpress_40x40%402x.png" width="40"
                                                        height="40" alt="WordPress" class="media-left rounded">
                                                    <span class="media-body">
                                                        <span class="card-title d-block mb-0">WordPress</span>
                                                        <span class="text-muted text-black-70 d-flex lh-1">13
                                                            courses</span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="mb-24pt">
                                                <a href="path.html" class="media text-black-100">
                                                    <img src="assets/images/paths/devops_40x40%402x.png" width="40"
                                                        height="40" alt="Development Tools" class="media-left rounded">
                                                    <span class="media-body">
                                                        <span class="card-title d-block mb-0">Development Tools</span>
                                                        <span class="text-muted text-black-70 d-flex lh-1">5
                                                            courses</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="paths.html"
                                                class="btn btn-block text-center btn-outline-secondary">Learning
                                                Paths</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>