<template>
    <div class="container mx-auto flex flex-wrap">
            <Employee v-for="employee in employees" :key="employee.id" :employee="employee" @movementWasStored="fetchData()"></Employee>
    </div>
</template>

<script>

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

        mounted() {
            this.fetchData();
        },

        methods: {
            fetchData(){
                axios.get('/').then((employees) => {
                    this.employees = employees.data;
                    this.$emit('dataWasFetched');
                });
            }
        }
    }
</script>
