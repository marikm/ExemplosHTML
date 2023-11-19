<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="lanchonete.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanchonete</title>
</head>
<body>
    <header>L A N C H O N E T E</header>
    <form action="lanchonete.php" method="GET">
        <div class="pedido"> 
            <div class="coluna">
            <select name="lanche" class="escolha">
                <option value="0.00">--- Escolha seu lanche ---</option>
                <option value="4.50">X-Burguer - R$ 4.50 </option>
                <option value="6.00">X-Frango - R$ 6.00 </option>
                <option value="8.50">X-Tudo - R$ 8.50 </option>
                <option value="5.00">X-Salada - R$ 5.00 </option>
            </select>
            </div>
            <div class="coluna">
                <p>Bebida</p>
                <div>
                    <input class="linha" type="checkbox" id="cocacola" name="bebida[]" value="2.50"/>
                    <label class="linha" for="cocacola"> Coca-Cola - R$ 2.50 </label>
                </div>
                <div>
                    <input type="checkbox" id="sucolaranja" name="bebida[]" value="1.90"/>
                    <label for="sucolaranja"> Suco de laranja - R$ 1.90</label>
                </div>
                <div>
                    <input type="checkbox" id="fanta" name="bebida[]" value="2.20"/>
                    <label for="fanta"> Fanta - R$ 2.20</label>
                </div>
                <div>
                    <input type="checkbox" id="guarana" name="bebida[]" value="2.50"/>
                    <label for="guarana"> Guarana - R$ 2.50</label>
                </div> 
            </div>
            <div class="coluna">
                <p>Adicionais</p> 
                <div>
                    <input type="checkbox" id="egg" name="adicionais[]" value="0.50"/>
                    <label for="egg"> Egg - R$ 0.50 </label></div>
                <div>
                    <input type="checkbox" id="bacon" name="adicionais[]" value="1.50"/>
                    <label for="bacon"> Bacon - 1.50 </label>
                </div>
                <div>
                    <input type="checkbox" id="calabresa" name="adicionais[]" value="1.20"/>
                    <label for="calabresa"> Calabresa - R$ 1.20 </label>
                </div>
                <div>
                <input type="checkbox" id="maionese" name="adicionais[]" value="0.30"/>
                    <label for="maionese"> Maionese - R$ 0.30 </label>
                </div>
            </div>

        </div>
        
        <div class="totalBox">
            <div class="button">
                <button>calcular</button>
            </div>

            <div class="totalLinha">
                <div class="totalTexto"> 
                    Total R$: 
                </div>

                <div class="totalValor">
                    <?php 
                        @$valorDoLanche = 0;
                        @$valorDaBebida = 0;
                        @$valorDoAdicional = 0;
                        
                        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                            // Verifica se o campo 'adicionais' está definido no array $_POST
                        
                            if(isset($_GET["adicionais"])) {
                                $valorDoAdicional = $_GET["adicionais"];
                                $valorDoAdicional = array_sum($valorDoAdicional);
                            } 
                            if(isset($_GET["lanche"])){
                                $valorDoLanche = $_GET["lanche"];
                            }
                            if(isset($_GET["bebida"])){
                                $valorDaBebida = $_GET["bebida"];
                                $valorDaBebida = array_sum($valorDaBebida);
                            }
                        
                        }
                        $total = $valorDoAdicional + $valorDaBebida + $valorDoLanche;
                    
                        echo number_format($total, 2, ',', '.');
                    ?>
                </div>
            </div>
            
        </div>
    </form>

</body>
</html>


<?php



?>
