<main class="contenedor-tabla">

    <section>
        <table class="tabla-sorteo">
            <tbody>
                <tr>
                <?php
                    $contador = 0;
                    foreach ($numeros as $numero):
                        $contador++;
                ?>
                    <td data-id="<?= $numero->id ?>" class="<?= $numero->vendido ? 'vendido' : '' ?>">
                        <?= str_pad($numero->numero, 2, '0', STR_PAD_LEFT) ?>
                    </td>
                <?php
                        if ($contador % 10 === 0) echo '</tr><tr>';
                    endforeach;
                ?>
                </tr>
            </tbody>
        </table>
    </section>

</main>
