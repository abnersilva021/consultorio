<?php
class Consultorio
{
    private $nome;
    private $ano;
    private $peso;
    private $altura;
    private $idade;
    private $imc;

    public function __construct()
    {
        $this->nome = "";
        $this->ano = 0;
        $this->peso = 0.0;
        $this->altura = 0.0;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getnome()
    {
        return $this->nome;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    public function getAltura()
    {
        return $this->altura;
    }

    public function calcularIdade($ano)
    {
        $anoAtual = date('Y');
        $idade = $anoAtual - $ano;
        $this->idade = $idade;
    }
    public function calcularIMC($peso, $altura)
    {
        $imc = $peso / ($altura * $altura);
        $imc = number_format($imc, 2);
        $this->imc = $imc;
        $classificacao = ($imc < 18.5) ? "Abaixo do peso" : (($imc < 24.9) ? "Peso Normal" : (($imc < 29.9) ? "Sobre peso" : "Obesidade"));
        return "Seu IMC é " . $imc . ". Classificado como " . $classificacao;
    }

    public function imprimirResult()
    {
        echo "Nome: " . $this->nome . ".<br><br>Idade: " . $this->idade . " anos.<br><br>Ano de nascimento: " . $this->ano . ".<br><br>Peso: " . $this->peso . "Kg.<br><br>Altura: " . $this->altura . "m.<br><br>IMC: " . $this->imc . ".<br><br>Classificação: " . $classificacao = ($this->imc < 18.5) ? "Abaixo do peso" : (($this->imc < 24.9) ? "Peso Normal" : (($this->imc < 29.9) ? "Sobre peso" : "Obesidade"));;
    }
}