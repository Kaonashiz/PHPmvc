<!DOCTYPE html>
<html>
<head>
    <title>Usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div id="app" class="container mt-4">
    <h2>Lista de Usuários</h2>
    <ul class="list-group">
        <li v-for="user in users" class="list-group-item">{{ user.NOME }}</li>
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@3.4.15/dist/vue.global.prod.js"></script>
<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            users: <?php echo json_encode($data['users']); ?>
        };
    }
}).mount('#app');
</script>
</body>
</html>
