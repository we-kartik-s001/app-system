<script setup>
import {onMounted, ref, watch} from "vue";
import { useDoctorsAppointmentStore } from '../../stores/store-doctorsappointments'

import VhField from './../../vaahvue/vue-three/primeflex/VhField.vue'
import {useRoute} from 'vue-router';


const store = useDoctorsAppointmentStore();
const route = useRoute();

onMounted(async () => {
    /**
     * Fetch the record from the database
     */
    if((!store.item || Object.keys(store.item).length < 1)
            && route.params && route.params.id)
    {
        await store.getItem(route.params.id);
    }

    await store.getFormMenu();
});

//--------form_menu
const form_menu = ref();
const toggleFormMenu = (event) => {
    form_menu.value.toggle(event);
};
//--------/form_menu

</script>
<template>

    <div class="col-6" >

        <Panel class="is-small">

            <template class="p-1" #header>


                <div class="flex flex-row">
                    <div class="p-panel-title">
                        <span v-if="store.item && store.item.id">
                            Update
                        </span>
                        <span v-else>
                            Create
                        </span>
                    </div>

                </div>


            </template>

            <template #icons>


                <div class="p-inputgroup">

                    <Button class="p-button-sm"
                            v-tooltip.left="'View'"
                            v-if="store.item && store.item.id"
                            data-testid="doctorsappointments-view_item"
                            @click="store.toView(store.item)"
                            icon="pi pi-eye"/>

                    <Button label="Save"
                            class="p-button-sm"
                            v-if="store.item && store.item.id"
                            data-testid="doctorsappointments-save"
                            @click="store.itemAction('save')"
                            icon="pi pi-save"/>

                    <Button label="Create & New"
                            v-else
                            @click="store.itemAction('create-and-new')"
                            class="p-button-sm"
                            data-testid="doctorsappointments-create-and-new"
                            icon="pi pi-save"/>


                    <!--form_menu-->
                    <Button
                        type="button"
                        @click="toggleFormMenu"
                        class="p-button-sm"
                        data-testid="doctorsappointments-form-menu"
                        icon="pi pi-angle-down"
                        aria-haspopup="true"/>

                    <Menu ref="form_menu"
                          :model="store.form_menu_list"
                          :popup="true" />
                    <!--/form_menu-->


                    <Button class="p-button-primary p-button-sm"
                            icon="pi pi-times"
                            data-testid="doctorsappointments-to-list"
                            @click="store.toList()">
                    </Button>
                </div>



            </template>


            <div v-if="store.item" class="mt-2">

                <Message severity="error"
                         class="p-container-message mb-3"
                         :closable="false"
                         icon="pi pi-trash"
                         v-if="store.item.deleted_at">

                    <div class="flex align-items-center justify-content-between">

                        <div class="">
                            Deleted {{store.item.deleted_at}}
                        </div>

                        <div class="ml-3">
                            <Button label="Restore"
                                    class="p-button-sm"
                                    data-testid="articles-item-restore"
                                    @click="store.itemAction('restore')">
                            </Button>
                        </div>

                    </div>

                </Message>


                <VhField label="Title">
                    <div class="p-inputgroup">
                        <InputText class="w-full"
                                   placeholder="Appointment title"
                                   name="doctorsappointments-title"
                                   data-testid="doctorsappointments-title"
                                   @update:modelValue="store.watchItem"
                                   v-model="store.item.title" required/>
                        <div class="required-field hidden"></div>
                    </div>
                </VhField>

<!--                <VhField label="Slug">-->
<!--                    <div class="p-inputgroup">-->
<!--                        <InputText class="w-full"-->
<!--                                   placeholder="Enter the slug"-->
<!--                                   name="doctorsappointments-slug"-->
<!--                                   data-testid="doctorsappointments-slug"-->
<!--                                   v-model="store.item.slug" required/>-->
<!--                        <div class="required-field hidden"></div>-->
<!--                    </div>-->
<!--                </VhField>-->

                <VhField label="Start Time">
                    <div class="p-inputgroup">
                        <Calendar v-model="store.item.start_time" showTime
                                  name="doctorsappointments-start_time"
                                  data-testid="doctorsappointments-start_time"
                        />
<!--                        <InputText class="w-full"-->
<!--                                   placeholder="Enter the slug"-->
<!--                                   name="doctorsappointments-slug"-->
<!--                                   data-testid="doctorsappointments-slug"-->
<!--                                   v-model="store.item.slug" required/>-->
                        <div class="required-field hidden"></div>
                    </div>
                </VhField>

                <VhField label="End Time">
                    <div class="p-inputgroup">
                        <Calendar v-model="store.item.end_time" showTime
                                  name="doctorsappointments-end_time"
                                  data-testid="doctorsappointments-end_time"
                        />
                        <div class="required-field hidden"></div>
                    </div>
                </VhField>

                <VhField label="Is Active">
                    <InputSwitch v-bind:false-value="0"
                                 v-bind:true-value="1"
                                 class="p-inputswitch-sm"
                                 name="doctorsappointments-active"
                                 data-testid="doctorsappointments-active"
                                 v-model="store.item.is_active"/>
                </VhField>

            </div>
        </Panel>

    </div>

</template>
