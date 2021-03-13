@extends('layout.master')
@section('content')
<style>
    .pie {
    position: relative;
    display: inline-block;
    background-image: conic-gradient(
      rgba(0,0,0,0) calc(3.6deg * var(--percent)),
      rgba(0,0,0,1) calc(3.6deg * var(--percent))
    );
    background-blend-mode: overlay;
    background-position: 50% 50%;
    background-size: 150%; /* oversize bg image to prevent "underdraw" */
    width: 3.75em;
    height: 3.75em;
    border-radius: 50%;
  }

  /* show the percentage (thanks to Ana Tudor for the counter() trick) */
  .pie--value::after {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    counter-reset: percent var(--percent);
    content: counter(percent) "%";
    color: #fff;
    text-shadow: 0 0 1px #000;
  }

  .pie--disc::before {
    content: '';
    position: absolute;
    top: .5em;
    left: .5em;
    right: .5em;
    bottom: .5em;
    border-radius: 50%;
    background: #fff;
  }

  .pie--disc::after {
    color: #000;
    text-shadow: none;
  }


  /* demo styles
  ----------------------------------------------------- */

  body::before {
    color: red;
    font-size: 150%;
    content: "This browser doesn't support conical graidents yet";
  }

  @supports (background: conic-gradient(red, blue)) {
    body::before {
      content: '';
    }
  }

  body {
    font: 90%/1.5 Arial;
    background: #fcf3f0;
    text-align: center;
  }

  .pie {
    border: .15em solid #fff;
    box-shadow: 0 .075em .2em .05em rgba(0,0,0,.25);
    margin: .75rem;
  }
  .pie:nth-child(1) {
    background-color: #d44;
  }
  .pie:nth-child(2) {
    background-color: #fc3;
  }
  .pie:nth-child(3) {
    background-color: #ac0;
  }
  .pie:nth-child(4) {
    background-color: #0ac;
  }
  .pie:nth-child(5) {
    background-color: #d6b;
  }
  .big {
    font-size:400%;
  }
  .med {
    font-size: 150%;
  }
  .sml {
    font-size: 100%;
  }
  </style>
        <h1>Vue Proportionnelle des Factures </h1>
        <div class="big">
            <div name="diagnostic" class="pie pie--value pie--disc" style="--percent:35;"></div><label for="diagnostic" style="font-size:17px"><span class="badge badge-danger" style="padding:12px"> Impayes |</span></label>
            <div name="devis" class="pie pie--value pie--disc" style="--percent:75;"></div><label for="devis" style="font-size:17px"><span class="badge badge-success" style="padding:12px"> A jours |</span></label>
            <div id="resume" class="pie pie--value pie--disc" style="--percent:17;"></div><label for="devis" style="font-size:17px"><span class="badge" style="background: #DD66BB; padding:12px">Avance |</span></label>
            <div id="facture" class="pie pie--value pie--disc" style="--percent:98;"></div><label for="devis" style="font-size:17px">Arriere|</label>
            {{-- <div class="pie pie--disc" style="--percent:40;"></div> --}}
        </div>
<script>
    function loop(t) {
        requestAnimationFrame(loop);
        updateCharts(Math.floor(t / 16) % 100);
    }

    function updateCharts(value) {
        charts.forEach(chart => setChartValue(chart, value));
    }

    function setChartValue(chart, value) {
        chart.style.setProperty('--percent', value);
    }

    let charts = document.querySelectorAll('.js');

    loop();
</script>        
@endsection