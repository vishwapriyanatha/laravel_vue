<template>
    <div>
        <div class="row">
            <input type="text" class="form-control col-sm-8" v-model="searchOrganizationValue"
                   placeholder="Search Organization">
            <input type="button" class="btn btn-primary" value="Search" @click="searchOrganization">
        </div>
        <table class="table table-striped table-bordered" v-if="organizations.length">
            <thead>
            <th>Name</th>
            <th>Ticket</th>
            </thead>
            <tbody>
            <tr v-for="organization in organizations">
                <td>{{organization.name}}</td>
                <td>
                    <table class="table table-bordered" v-if="organization.tickets.length">
                        <thead>
                        <th>Ticket Title</th>
                        <th>Ticket Status</th>
                        <th>Assignee</th>
                        </thead>
                        <tbody>
                        <tr v-for="ticket in organization.tickets">
                            <td>{{ticket.subject}}</td>
                            <td>{{ticket.type}}</td>
                            <td>{{(ticket.assignee)?ticket.assignee.name:''}}</td>

                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "organization",
        data() {
            return {
                organizations: {},
                searchOrganizationValue: ''
            }
        },
        methods: {
            searchOrganization() {
                let self = this;
                axios.get('/organizations?search=' + self.searchOrganizationValue)
                    .then((response) => {
                        self.organizations = response.data;
                    });
            },
        }
    }
</script>

<style scoped>

</style>