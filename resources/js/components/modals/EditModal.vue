<template>
    <div class="modal-overlay">
        <div class="modal">
            <h6>Edit Modal </h6>
            <div style="">
                <h4 :style="todoClass ? { 'display': 'block' } : { 'display': 'none' }" >Success</h4>
                <span> Title </span>
                <input style="display: block; margin: auto; margin-bottom: 10px" @input="todoItem.title = $event.target.value" :value="todoItem.title" type="text">
                <span>Desc </span>
                <input style="display: block; margin: auto; margin-bottom: 10px" @input="todoItem.desc = $event.target.value" :value="todoItem.desc" type="text">
            </div>
            <button @click="updateTodoEvent()">Update</button>
            <div class="close" @click="$emit('close-modal')">
                <button>xx</button>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: ["todoItem","todoClass"],
    methods:{
        data() {
            return {
                condition: false
            }
        },
        updateTodoEvent(){
            let title = this.todoItem.title
            let desc = this.todoItem.desc
            let id = this.todoItem.id
            let values = {
                'id': id,
                'title': title,
                'desc': desc
            }
            this.$emit('updateTodoEvent', values)

        }
    }
}
</script>

<style scoped>

.modal-overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    background-color: #000000da;
}

.modal {
    text-align: center;
    background-color: white;
    height: 400px;
    width: 500px;
    margin-top: 10%;
    padding: 60px 0;
    border-radius: 20px;
}
.close {
    margin: 10% 0 0 16px;
    cursor: pointer;
}

.check {
    width: 150px;
}

h6 {
    font-weight: 500;
    font-size: 28px;
    margin: 20px 0;
}

p {
    font-size: 16px;
    margin: 20px 0;
}

button {
    background-color: #ac003e;
    width: 180px;
    height: 40px;
    color: white;
    font-size: 14px;
    border-radius: 16px;
    margin-top: 50px;
}
</style>
