<template>
    <div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-12 text-left">

                    <div class="element-wrapper">

                        <div class="element-box new-form-theme">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link"
                                       data-toggle="tab" @click.prevent="changeTab(1)" href="#sms_package"
                                       role="tab">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                       data-toggle="tab" @click.prevent="changeTab(2)"
                                       href="#sms_payment_history" role="tab">Organizations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                       data-toggle="tab" @click.prevent="changeTab(3)"
                                       href="#sms_payment_history" role="tab">Tickets</a>
                                </li>
                            </ul>
                            <div class="tab-content" role="tablist">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        name: "index",
        methods: {
            changeTab: function (id) {
                let self = this;
                switch (id) {
                    case 1:
                        self.$router.push({name: 'user'});
                        break;

                    case 2:
                        self.$router.push({name: 'organization'});
                        break;
                    case 3:
                        self.$router.push({name: 'ticket'});
                        break;
                }

            }
        }
    }
</script>

<style scoped>

</style>