<template>
    <div>
        <div class="row">
            <input type="text" class="form-control col-sm-8" v-model="searchTicketValue"
                   placeholder="Search Ticket">
            <input type="button" class="btn btn-primary" value="Search" @click="searchOrganization">
        </div>
        <table class="table table-striped table-bordered" v-if="tickets.length">
            <thead>
            <th>Ticket Subject</th>
            <th>Ticket Description</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Via</th>
            <th>Assignee</th>
            <th>Submitter</th>
            <th>Organization</th>
            <th>Due Date</th>
            </thead>
            <tbody>
            <tr v-for="ticket in tickets">
                <td>{{ticket.subject}}</td>
                <td>{{ticket.description}}</td>
                <td>{{ticket.priority}}</td>
                <td>{{ticket.status}}</td>
                <td>{{ticket.via}}</td>
                <td>{{(ticket.assignee) ? ticket.assignee.name:''}}</td>
                <td>{{(ticket.submitter)?ticket.submitter.name:''}}</td>
                <td>{{(ticket.organization)?ticket.organization.name:''}}</td>
                <td>{{ changeDate(ticket.due_at)}}</td>

            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        name: "ticket",
        data() {
            return {
                tickets: {},
                searchTicketValue: ''
            }
        },
        methods: {
            changeDate(val) {
                return moment(val, 'YYYY-MM-DD HH:mm:ss').fromNow()
            },
            searchOrganization() {
                let self = this;
                axios.get('/tickets?search=' + self.searchTicketValue)
                    .then((response) => {
                        self.tickets = response.data;
                    });
            },
        }
    }
</script>

<style scoped>

</style>