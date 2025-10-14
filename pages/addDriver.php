<div>
    <form action="private.php?page=drivers" method="post">
        <section>
                <label for="driverName">Nome</label>
                <input type="text" name="driverName" id="driverName">
            </section>

            <section>
                <label for="driverLevel">Level</label>
                <input type="integer" name="driverLevel" id="driverLevel">
            </section>

            <section>
                <label for="driverNumber">Número</label>
                <input type="integer" name="driverNumber" id="driverNumber">
            </section>
            
            <section>
                <label for="driverColor">Cor do Piloto</label>
                <input type="text" name="driverColor" id="driverColor">
            </section>

            <section>
                <label for="driverCountry">País</label>
                <input type="combo" name="driverColor" id="driverColor">
            </section>

            <section>
                <input type="submit" value="Criar Piloto" name="btn-submit">
            </section>

    </form>
</div>