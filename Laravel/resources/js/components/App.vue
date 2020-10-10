<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Sistema de monitoreo dispositivos IoT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul>
                <router-link tag="li" to="/" exact>
                                    <a>Home</a>
                </router-link>
                <router-link tag="li" to="/dispositivos">
                                    <a>Dispositivos</a>
                </router-link>
                <router-link tag="li" to="/sensores">
                                    <a>Sensores</a>
                </router-link>              
            </ul>
        </div>
        </nav>
    <router-view></router-view>
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <hr>

                    <footer>
                        <p>© 2018 Rimorsoft Online.</p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'App'
}
</script>

<style>
    body {
        padding-top: 0px;
    }
</style>