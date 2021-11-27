@extends('front.layouts.app')

@section('title', 'Q & A')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                      <div class="card-header d-flex flex-column text-center">
                        <i class="fas fa-question-circle text-success" style="font-size: 48px;"></i>
                        <h1 class="text-success poppins">Question & Answer</h1>
                        <p class="text-muted">Berikut adalah pertanyaan yang paling sering ditanyakan oleh calon santri, Beserta jawabannya.</p>
                        <p class="text-dark"><b>Silahkan manfaatkan fitur ini sebelum bertanya di whatsapp!</b></p>
                      </div>
                      <div class="card-body">
                        <div id="accordion">
                          <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                              <h4>Apa langkah selanjutnya setelah mendaftar?</h4>
                            </div>
                            <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                          </div>
                          <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                              <h4>Panel 2</h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                          </div>
                          <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                              <h4>Panel 3</h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
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