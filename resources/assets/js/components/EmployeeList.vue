<template>
    <div class="flex flex-wrap">
            <Employee v-for="employee in employees" :key="employee.id" :employee="employee" @movementWasStored="fetchData()"></Employee>
    </div>
</template>

<script>

    // import Pusher from 'pusher-js'
    import Employee from './Employee.vue';

    export default {

        data() {
            return {
                employees: ''
            }
        },

        components: {
            Employee
        },

        created () {
            this.subscribe()
        },

        mounted() {
            this.fetchData();
        },

        methods: {
            subscribe () {
                  let pusher = new Pusher('7287b3826137a9d8bab5', { cluster: 'eu' })
                  pusher.subscribe('presence_dashboard')
                  pusher.bind('App\\Events\\MovementWasMade', data => {
                    this.fetchData()
                  })
                },
            fetchData(){
                axios.get('/').then((employees) => {
                    this.employees = employees.data;
                    this.$emit('dataWasFetched');
                });
            }
        }
    }
</script>
