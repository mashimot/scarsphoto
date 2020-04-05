@extends('layouts.app-scars')
@section('css')
<style>
*, *:after, *:before { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }
body, html { font-size: 100%; padding: 0; margin: 0; height: 100%;}

/* Clearfix hack by Nicolas Gallagher: http://nicolasgallagher.com/micro-clearfix-hack/ */
.clearfix:before, .clearfix:after { content: " "; display: table; }
.clearfix:after { clear: both; }

body {
    color: #fff;
    background: #000;
}

a {
    color: #f0f0f0;
    text-decoration: none;
}

a:hover {
    color: #fff;
}

div {
    font-family: 'Dosis', 'Lato', sans-serif;
    font-size: 2.1vw;
    font-weight: 200;
    width: 100%;
    /*overflow: hidden;*/
    text-transform: uppercase;

    /*position: absolute;
    padding: 0;
    margin: 0;
    top: 0;
    left: 0;*/
    letter-spacing: 14px;
    text-align: center;
}

.phrases,
.phrases > span {
    height: 100%;
    font-family: 'Dosis', 'Lato', sans-serif !important;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-box-pack: center;
    -moz-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -moz-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
}

.phrases > span {
    margin: 0 15px;
}

.phrases > span > span {

    display: inline-block;
    -webkit-perspective: 1000px;
    -moz-perspective: 1000px;
    perspective: 1000px;
    -webkit-transform-origin: 50% 50%;
    -moz-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
}
@media screen and (max-width: 568px) {
    div {
        font-size:35px !important;
    }
}
.phrases > span > span > span {

    font-family: 'Dosis', 'Lato', sans-serif !important;
    display: inline-block;
    color: hsla(0,0%,0%,0);
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    transform-style: preserve-3d;
    -webkit-transform: translate3d(0,0,0);
    -moz-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
    -webkit-animation: OpeningSequence 5.0s linear forwards;
    -moz-animation: OpeningSequence 5.0s linear forwards;
    animation: OpeningSequence 5.0s linear forwards;
}

.intro-phrases .f7 > span > span > span {

    font-size: 200px !important;

    -webkit-animation-delay: 5s;
    -moz-animation-delay: 5s;
    animation-delay: 5s;

}
.intro-phrases .f1 > span > span > span{
    font-size: 150px !important;
}

.intro-phrases .f6  > span > span > span {

    -webkit-animation: teste 9.0s linear ;
    -moz-animation: teste 9.0s linear ;
    animation: teste 9.0s linear ;
}
@-webkit-keyframes teste {
    0% {
        text-shadow: 0 0 50px #fff;
        letter-spacing: 80px;
        display: none;
        -webkit-transform: rotateY(-90deg);
    }
    15% {
        text-shadow: 0 0 1px #fff;
        letter-spacing: 14px;
        display: block;
        -webkit-transform: rotateY(0deg);
    }
    85% {
        text-shadow: 0 0 1px #fff;
        display: block;
        -webkit-transform: rotateY(0deg) translateZ(0px);
    }
    100% {
        text-shadow: 0 0 10px #fff;
        display: none;
        -webkit-transform: translateZ(0px);
        pointer-events: none;
    }
}

@-webkit-keyframes OpeningSequence {
    0% {
        text-shadow: 0 0 50px #fff;
        letter-spacing: 80px;
        display: none;
        -webkit-transform: rotateY(-90deg);
    }
    50% {
        text-shadow: 0 0 1px #fff;
        letter-spacing: 14px;
        opacity: 0.8;
        -webkit-transform: rotateY(0deg);
    }
    85% {
        text-shadow: 0 0 1px #fff;
        opacity: 0.8;
        -webkit-transform: rotateY(0deg) translateZ(0px);
    }
    100% {
        text-shadow: 0 0 10px #fff;
        opacity: 0;
        -webkit-transform: translateZ(0px);
        pointer-events: none;
    }
}

@-moz-keyframes OpeningSequence {
    0% {
        text-shadow: 0 0 50px #fff;
        letter-spacing: 80px;
        opacity: 0.2;
        -moz-transform: rotateY(-90deg);
    }
    50% {
        text-shadow: 0 0 1px #fff;
        letter-spacing: 14px;
        opacity: 0.8;
        -moz-transform: rotateY(0deg);
    }
    85% {
        text-shadow: 0 0 1px #fff;
        opacity: 0.8;
        -moz-transform: rotateY(0deg) translateZ(0px);
    }
    100% {
        text-shadow: 0 0 10px #fff;
        opacity: 0;
        -moz-transform: translateZ(0px);
        pointer-events: none;
    }
}

@keyframes OpeningSequence {
    0% {
        text-shadow: 0 0 50px #fff;
        letter-spacing: 80px;
        opacity: 0.2;
        transform: rotateY(-90deg);
    }
    50% {
        text-shadow: 0 0 1px #fff;
        letter-spacing: 14px;
        opacity: 0.8;
        transform: rotateY(0deg);
    }
    85% {
        text-shadow: 0 0 1px #fff;
        opacity: 0.8;
        transform: rotateY(0deg) translateZ(0px);
    }
    100% {
        text-shadow: 0 0 10px #fff;
        opacity: 0;
        transform: translateZ(0px);
        pointer-events: none;
    }
}

@-webkit-keyframes FadeIn {
    0% {
        opacity: 0;
        text-shadow: 0 0 50px #fff;
    }
    100% {
        opacity: 0.8;
        text-shadow: 0 0 1px #fff;
    }
}

@-moz-keyframes FadeIn {
    0% {
        opacity: 0;
        text-shadow: 0 0 50px #fff;
    }
    100% {
        opacity: 0.8;
        text-shadow: 0 0 1px #fff;
    }
}

@keyframes FadeIn {
    0% {
        opacity: 0;
        text-shadow: 0 0 50px #fff;
    }
    100% {
        opacity: 0.8;
        text-shadow: 0 0 1px #fff;
    }
}


.intro-phrases .f1{
    position: absolute;
    padding-top: 30px;
}
</style>
@endsection

@section('content')
<div class="container-fluid h-100">
    <a href="{{ route('home') }}" class="pull-right">
        skip
    </a>

    <div class="row justify-content-center align-items-center">
        <div class="intro-phrases" >
            <div class="row">
                <div class="col-6">
                    <div data-seconds="4" class="phrases f2">Para uma experiência única</div>
                </div>
                <div class="col-6">
                    <div data-seconds="5" class="phrases f3 text-center">Um desejo</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div data-seconds="0" class="phrases f1">Prepare-se</div>
                    <div data-seconds="11" class="phrases f6">Bem vindo ao mundo</div>
                    <div data-seconds="14" class="phrases f7">SCARS</div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div data-seconds="5.5" class="phrases f4">Uma lembrança</div>
                </div>
                <div class="col-6">
                    <div data-seconds="6" class="phrases f5">Um momento Singular</div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /conteudo -->
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js"></script>
<script>
$(document).ready(function() {
    arr = [];
    $(".phrases").each(function(i,value){
        $(this).lettering('words').children("span").lettering().children("span").lettering();
        let seconds = $(this).data("seconds");
        $(this).find("span").each(function(){
            let $this = $(this);
            $this.addClass("textxLarge");
            $this.css({
                '-webkit-animation-delay': `${seconds}s`,
                '-moz-animation-delay': `${seconds}s`,
                'animation-delay': `${seconds}s`,
            });
        });
    });
});
</script>
@endsection
