<template>
    <div class="flex lg:w-1/2 md:w-full sm:w-full xs:w-full  w-full ">
        <div class="inline-block mx-1 my-1 w-full sm:rounded shadow bg-grey-darker  text-white">
            <div class="flex items-center justify-between px-2 py-2" >
                <div class="flex items-center w-1/2">
                    <img class="rounded-full inline-block h-18 w-18 " :src="employee.avatar">
                    <div class="ml-4 block uppercase text-xl" v-text="employee.name"></div>
                </div>

                <div class="w-1/4 float-right">
                    <small class="ml-4">{{ lastMovementInfo }}</small>
                </div>

                <div class="w-1/8 flex items-center ">
                        <toggle-button @change="storePresence" :speed="80" :sync="true" :id="employee_id" :value="this.isOut()" :cssColors="true" class="rounded-full text-xl" :class="buttonClass" :height="40" :width="100" :labels="{checked: 'Out', unchecked: 'In'}"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {


        props: ['employee'],

        data() {
            return {
                'lastMovementInfo': '',
                'employee_id' : this.employee.id
            }
        },

        mounted(){
            this.updateLastMovementInfo();
            this.poll();
        },

        computed: {
            buttonClass(){
                return (this.isOut()) ? 'bg-red' : 'bg-green';
            },

            buttonType(){
                return (this.isOut()) ? 'out' : 'in';
            },

            employeeNewPresence(){
                return (!this.isOut()) ? 'out' : 'in';
            }

        },

        methods: {

            poll(){
                var vm = this;
                setTimeout(function(){
                    vm.updateLastMovementInfo();
                    vm.poll();
                }, 60000);
            },

            updateLastMovementInfo(){
                if(!(this.employee.last_presence) ){
                    this.lastMovementInfo = 'Not in yet';
                }else{
                var date = (this.isOut()) ? this.employee.last_presence.updated_at : this.employee.last_presence.created_at;
                this.lastMovementInfo = 'Got ' + this.buttonType + " " + Vue.moment.utc(date, "YYYY-MM-DD HH:mm:ss").local().fromNow();

                }

            },

            isOut(){
                return !(this.employee.last_presence) || this.employee.last_presence.status == 'out';
            },

            storePresence(){
                axios.post('/presences', {'employee_id': this.employee_id, 'type': this.employeeNewPresence}).then((employees) => {
                    this.$emit('presenceWasStored');
                });
            }
        }
    }
</script>
