<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
<nav class="navbar has-shadow">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="./">Consulta de saldo de pontos de fidelidade</a>
            <a class="navbar-item api" href="javascript:void(0);">API (Log de consultas)</a>
        <div class="navbar-burger burger" data-target="navMenu"><span></span><span></span><span></span></div>
    	</div>
	</div>
</nav>
<section class="hero is-info">
<div class="hero-body">
    <div class="container">

        <div class="modal">
          <div class="modal-background"></div>
          <div class="modal-card" style="width:960px;">
            <header class="modal-card-head">
              <p class="modal-card-title">Log de consultas realizadas na API</p>
              <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body resposta-log">
            </section>
          </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="content">
                    <div class="control has-icons-left has-icons-right is-clearfix">
                        <input class="input is-large numero-documento" type="search" placeholder="Número do documento" style="padding-left:1.00em" maxlength="9"/>
                        <div class="is-pulled-right" style="margin-top:20px">
                        	<a class="button is-light is-medium btn-consultar">Consultar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="resultado hide">
  		<div class="card" style="margin-top:20px">
  		  <div class="card-content">
            	<div class="media-content">
  		        <p class="subtitle is-4 resposta-resultado" style="color:#000">Resultado da consulta pelo Número de documento XXXXXX</p>
        		</div>
  		  </div>
  		</div>
  		<div class="card">
  		  <div class="card-content bloco-conteudo">
  		    <p class="title is-4" style="color:#000">
  		      Saldo disponível em dinheiro: <span class="resposta-saldo-disponivel">R$ XX,XX</span>
  		    </p>
  			<p class="title is-4" style="color:#000">
  		      Pontos: <span class="resposta-pontos">XX</span>
  		    </p>
  		  </div>
  		</div>
    </div>
    <div class="resultado-api hide">
      <div class="card" style="margin-top:20px">
        <div class="card-content">
              <div class="media-content">
              <p class="subtitle is-4 resposta-resultado-api" style="color:#000">Retorno da API - Somente para fins didáticos</p>
            </div>
        </div>
      </div>

      <div class="card">
        <div class="card-content">
          <p class="title is-5 resposta-api" style="color:#000">
            
          </p>
        </div>
      </div>
    </div>
    </div>
</div>
</section>