@extends('front.layouts.app')

@section('title','Tes Tahap Keempat')
    
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container py-5">
                <div class="my-4">
                  <div class="row justify-content-center px-4">
                    <div class="col-md-10 col-sm-12 title">
                      <h5>
                        <strong> <i class="fa fa-link ico"></i> Link Video</strong>
                      </h5>
                      <p class="card-text">
                        Silahkan kirim Link Video Melalui Form Dibawah Ini !
                      </p>
          
                      <div class="card text-left overflow-auto">
                        <div class="card-body">
          
                          <h5>Video cara mengirimkan link video</h5>
                          <p>bagi yang kesulitan mangikuti tes tahap ini bisa simak video di bawah ini</p>
                          <div class="row">
                            <div class="col m-auto ">
                              <div class="d-none d-md-block">
                                  <iframe width="560" height="315" src="https://www.youtube.com/embed/_ZJLc9FgvSM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              </div>
                              <div class="d-sm-block d-md-none">
                                  <iframe width="295" height="172" src="https://www.youtube.com/embed/_ZJLc9FgvSM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              </div>
                            </div>
                          </div>
          
                          <hr class="mb-4 pb-4">
          
                          <form method="POST" action="">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Link Video <b>*</b> </label>
                              <input
                                type="twxt"
                                required
                                class="form-control"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                name="link"
                              />
                            </div>
                          </div>
                          <div>
                            <button class="btn btn-primary mx-3 float-right mb-3">
                              Kirim
                            </button>
                          </form>
                        </div>              
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </section>
</div>

@endsection