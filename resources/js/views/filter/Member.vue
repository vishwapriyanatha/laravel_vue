<template>
    <div>
        <div class="row">
            <input type="text" class="form-control col-sm-8" v-model="searchMemberValue"
                   placeholder="Search User">
            <input type="button" class="btn btn-primary" value="Search" @click="searchMember">
        </div>
        <table class="table table-striped table-bordered" v-if="members.length">
            <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Ticket</th>
            </thead>
            <tbody>
            <tr v-for="member in members">
                <td>{{member.name}}</td>
                <td>{{member.email}}</td>
                <td>{{member.role}}</td>

                <td>
                    <table class="table table-bordered" v-if="member.tickets.length">
                        <thead>
                        <th>Ticket Title</th>
                        <th>Ticket Status</th>
                        <th>Organization</th>
                        </thead>
                        <tbody>
                        <tr v-for="ticket in member.tickets">
                            <td>{{ticket.subject}}</td>
                            <td>{{ticket.type}}</td>
                            <td>{{(ticket.organization)?ticket.organization.name:''}}</td>

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
        name: "Member",
        data() {
            return {
                members: {},
                searchMemberValue: ''
            }
        },
        methods: {
            searchMember() {
                let self = this;
                axios.get('/members?search=' + self.searchMemberValue)
                    .then((response) => {
                        self.members = response.data;
                    });
            },
        }
    }
</script>

<style scoped>

</style>