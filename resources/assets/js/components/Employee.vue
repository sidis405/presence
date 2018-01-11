<template>
    <div class="flex lg:w-1/2 md:w-full sm:w-full xs:w-full  w-full ">
        <div class="inline-block mx-1 my-1 w-full sm:rounded shadow bg-grey-darker  text-white">
            <div class="flex items-center justify-between px-2 py-2" >
                <div class="flex items-center">
                    <img class="rounded-full inline-block h-18 w-18 " :src="employee.avatar">
                    <div class="ml-4 block uppercase text-xl" v-text="employee.name"></div>
                </div>

                <div class="float-right">
                        <!-- <Button :inType="buttonType" :inClass="buttonClass" @buttonWasPressed="storeMovement"></Button> -->
                        <toggle-button @change="storeMovement" :speed="80" :sync="true" :id="employee_id" :value="this.isOut()" :cssColors="true" class="rounded-full text-xl" :class="buttonClass" :height="40" :width="100" :labels="{checked: 'Out', unchecked: 'In'}"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Button from './Button.vue';

    export default {

        components: {
                    Button
                },

        props: ['employee'],

        data() {
            return {
                'employee_id' : this.employee.id
            }
        },

        computed: {
            buttonClass(){
                return (this.isOut()) ? 'bg-red' : 'bg-green';
            },

            buttonType(){
                return (this.isOut()) ? 'out' : 'in';
            },

            employeeNewMovement(){
                return (!this.isOut()) ? 'out' : 'in';
            },


        },

        methods: {
            isOut(){
                return !(this.employee.last_movement) || this.employee.last_movement.type == 'out';
            },

            storeMovement(){
                console.log('change');
                axios.post('/movements', {'employee_id': this.employee_id, 'type': this.employeeNewMovement}).then((employees) => {
                    this.$emit('movementWasStored');
                });
            }
        }
    }
</script>
