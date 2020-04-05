@extends('layouts.app-scars')

@section('content')
<div class="container-fluid">
    <!--section id="contact" class="hide-first">   Start contact -->
    <section id="contact" class="contact">  <!-- Start contact -->
        <form  id="formcontact" novalidate>  <!-- Contact form -->
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12">
                    <section id="footer"> <!-- Start footer -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 titulo">

                                <div class="animated bounceIn">
                                    <br>
                                    <br>
                                    <!-- Botão -->
                                    <a id="show"><h2>Entre em contact</h2></a>
                                    <br>
                                    <p>fabioh@scarsphoto.com.br</p>
                                    <p>www.scarsphoto.com.br</p>
                                </div>
                            </div>
                        </div>
                    </section> <!-- End footer -->

                    <div class="animated bounceIn">
                        <div class="row">
                            <div class="col-md-6"> <!-- 6 column grid left form -->
                                <div class="form-group"> <!-- Your name input -->
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Seu Nome *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group"> <!-- Your email input -->
                                    <input type="email" autocomplete="off" class="form-control" placeholder="Seu Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group"> <!-- Your phone no. input -->
                                    <input type="tel" autocomplete="off" class="form-control" placeholder="SEu Telefone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div> <!-- End 6 column grid left form -->
                            <div class="col-md-6"> <!-- 6 column grid right form-->
                                <div class="form-group"> <!-- Your message input -->
                                    <textarea class="form-control" placeholder="Sua Mensagem *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div> <!-- End 6 column grid right form-->
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-ms-12 text-center">
                                <div id="success"></div>
                                <button type="button" class="btn btn-send">Enviar</button> <!-- Send button -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form> <!-- End contact form -->
    </section> <!-- Start contact -->
</div>
@endsection

