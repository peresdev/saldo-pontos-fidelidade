<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
<nav class="navbar has-shadow">
    <div class="container">
        <div class="navbar-brand"><a class="navbar-item" href="/">Consulta de saldo de pontos de fidelidade</a>
            <a class="navbar-item" href="/">API</a>
        <div class="navbar-burger burger" data-target="navMenu"><span></span><span></span><span></span></div>
    	</div>
	</div>
</nav>
<section class="hero is-info">
<div class="hero-body">
    <div class="container">
        <div class="modal">
          <div class="modal-background"></div>
          <div class="modal-content">

          </div>
          <button class="modal-close is-large" aria-label="close"></button>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="content">
                    <div class="control has-icons-left has-icons-right is-clearfix">
                        <input class="input is-large" type="search" placeholder="Número do documento" style="padding-left:1.00em"/>
                        <div class="is-pulled-right" style="margin-top:20px">
                        	<a class="button is-light is-medium">Consultar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="card" style="margin-top:20px">
		  <div class="card-content">
          	<div class="media-content">
		        <p class="subtitle is-4" style="color:#000">Resultado da consulta pelo Número de documento XXXXXX</p>
      		</div>
		  </div>
		</div>
		<div class="card">
		  <div class="card-content">
		    <p class="title is-4" style="color:#000">
		      Saldo disponível em dinheiro: R$ 10,00
		    </p>
			<p class="title is-4" style="color:#000">
		      Pontos: 50
		    </p>
		  </div>
		</div>
    </div>
</div>
</section>