<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* components/itilobject/selfservice.html.twig */
class __TwigTemplate_52113d152002a62c3d9c63317ec109e1 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "
";
        // line 34
        $macros["fields"] = $this->macros["fields"] = $this->loadTemplate("components/form/fields_macros.html.twig", "components/itilobject/selfservice.html.twig", 34)->unwrap();
        // line 35
        echo "
";
        // line 36
        $context["rand"] = twig_random($this->env);
        // line 37
        $context["base_field_options"] = ["is_horizontal" => false, "full_width" => true, "full_width_adapt_column" => false, "fields_template" =>         // line 41
($context["itiltemplate"] ?? null), "rand" =>         // line 42
($context["rand"] ?? null)];
        // line 44
        $context["right_field_options"] = twig_array_merge(($context["base_field_options"] ?? null), ["is_horizontal" => true, "label_class" => "col-lg-3", "input_class" => "col-lg-9"]);
        // line 49
        echo "
<div class=\"container-lg\">

    ";
        // line 52
        if ((($context["has_tickets_to_validate"] ?? null) &&  !twig_test_empty(($context["url_validate"] ?? null)))) {
            // line 53
            echo "        <div class=\"alert alert-warning\" role=\"alert\">
            ";
            // line 54
            echo twig_escape_filter($this->env, __("There are some tickets awaiting approval"), "html", null, true);
            echo " — <a href=\"";
            echo twig_escape_filter($this->env, ($context["url_validate"] ?? null), "html", null, true);
            echo "\" class=\"alert-link\">";
            echo twig_escape_filter($this->env, __("check it out!"), "html", null, true);
            echo "</a>
        </div>
    ";
        }
        // line 57
        echo "
    ";
        // line 58
        if ((twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isNewItem", [], "method", false, false, false, 58) &&  !(($__internal_compile_0 = ($context["params"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["_glpi_csrf_token"] ?? null) : null))) {
            // line 59
            echo "        <div class=\"modal fade\" id=\"entitiesModal\" tabindex=\"-1\" role=\"dialog\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" aria-labelledby=\"entitiesModalLabel\" aria-hidden=\"true\">
            <div class=\"modal-dialog modal-sm\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h5 class=\"modal-title\">Sélectionnez l'entité</h5>
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                    </div>
                    <div class=\"modal-body\">
                    <select id=\"ticketEntities\" class=\"select2\" name=\"ticketEntities\"  style=\"width: 100%\">
                    <option selected disabled>Choisir l'entité</option>
                    </select>
                    </div>
                </div>
            </div>
        </div>
        <script>
         console.log(";
            // line 75
            echo json_encode($this->extensions['Glpi\Application\View\Extension\SessionExtension']->session("glpiactive_entity"));
            echo ");
      </script>
    ";
        }
        // line 78
        echo "
   ";
        // line 79
        echo twig_include($this->env, $context, "components/itilobject/mainform_open.html.twig");
        echo "

   ";
        // line 81
        echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\PluginExtension']->callPluginHook(twig_constant("Glpi\\Plugin\\Hooks::PRE_ITEM_FORM"), ["item" => ($context["item"] ?? null), "options" => ($context["params"] ?? null)]), "html", null, true);
        echo "

   <div class=\"card\">
        <div class=\"card-header\">
            <h3 class=\"card-title\">
                ";
        // line 86
        echo twig_escape_filter($this->env, __("Describe the incident or request"), "html", null, true);
        echo "
            </h3>
        </div>

        <div class=\"card-body bg-secondary-lt pt-0\">
            ";
        // line 91
        if (twig_length_filter($this->env, ($context["delegating"] ?? null))) {
            // line 92
            echo "                <div class=\"row align-items-end w-100\">
                    <div class=\"col-sm-6\">

                        ";
            // line 95
            ob_start(function () { return ''; });
            // line 96
            echo "                            <div id=\"delegate_other";
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\" class=\"card mt-2\">
                                <div class=\"card-body\">
                                    ";
            // line 98
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $this->extensions['Twig\Extra\String\StringExtension']->createUnicodeString(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "showActorAddFormOnCreate", [0 => twig_constant("CommonITILActor::REQUESTER"), 1 =>             // line 100
($context["params"] ?? null)], "method", false, false, false, 98)), "truncate", [0 => 0], "method", false, false, false, 101), "html", null, true);
            // line 101
            echo "
                                </div>
                            </div>
                        ";
            $context["actor_add_form"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 105
            echo "
                        ";
            // line 106
            echo twig_call_macro($macros["fields"], "macro_dropdownYesNo", ["nodelegate", (($__internal_compile_1 =             // line 108
($context["params"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["nodelegate"] ?? null) : null), __("This ticket concerns me"), twig_array_merge(            // line 110
($context["base_field_options"] ?? null), ["add_field_html" =>             // line 111
($context["actor_add_form"] ?? null)])], 106, $context, $this->getSourceContext());
            // line 113
            echo "
                    </div>
                    <div class=\"col-sm-6 ";
            // line 115
            echo ((($this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("use_check_pref") && (($__internal_compile_2 = ($context["params"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["nodelegate"] ?? null) : null))) ? ("") : ("d-none"));
            echo "\" id=\"user-info";
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "-block\">
                        ";
            // line 116
            ob_start(function () { return ''; });
            // line 117
            echo "                        <div class=\"d-inline-flex\">
                            <div class=\"card mb-0\" id=\"user-info";
            // line 118
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\">
                                <div class=\"card-body\">
                                    ";
            // line 120
            $context["user"] = $this->extensions['Glpi\Application\View\Extension\SessionExtension']->getCurrentUser();
            // line 121
            echo "                                    ";
            $context["user_fields"] = twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "fields", [], "any", false, false, false, 121);
            // line 122
            echo "                                    ";
            $context["user_fields"] = twig_array_merge(($context["user_fields"] ?? null), ["user_name" => $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getVerbatimValue(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getFriendlyName", [], "method", false, false, false, 122))]);
            // line 123
            echo "                                    ";
            $context["user_fields"] = twig_array_merge(($context["user_fields"] ?? null), ["email" => twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getDefaultEmail", [], "method", false, false, false, 123)]);
            // line 124
            echo "                                    ";
            echo twig_include($this->env, $context, "components/user/info_card.html.twig", ["user" =>             // line 125
($context["user_fields"] ?? null), "can_edit" => true], false);
            // line 127
            echo "
                                </div>
                            </div>
                        </div>
                        ";
            $context["personal_information"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 132
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_field", ["",             // line 134
($context["personal_information"] ?? null), __("Check your personnal information"),             // line 136
($context["base_field_options"] ?? null)], 132, $context, $this->getSourceContext());
            // line 137
            echo "
                    </div>
                </div>

            ";
        } else {
            // line 142
            echo "                <input type=\"hidden\" name=\"_users_id_requester\" value=\"";
            echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\SessionExtension']->session("glpiID"), "html", null, true);
            echo "\">
            ";
        }
        // line 144
        echo "        </div>
        <div class=\"card-body row mx-0\">
            <div class=\"offset-md-1 col-md-8 col-xxl-6\">
               ";
        // line 147
        echo twig_call_macro($macros["fields"], "macro_field", ["type", twig_get_attribute($this->env, $this->source,         // line 149
($context["item"] ?? null), "dropdownType", [0 => "type", 1 => twig_array_merge(["value" => (($__internal_compile_3 =         // line 150
($context["params"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["type"] ?? null) : null), "width" => "100%", "display" => false, "on_change" => "this.form.submit()"],         // line 154
($context["right_field_options"] ?? null))], "method", false, false, false, 149), _n("Type", "Types", 1),         // line 156
($context["right_field_options"] ?? null)], 147, $context, $this->getSourceContext());
        // line 157
        echo "

               ";
        // line 159
        $context["cat_params"] = twig_array_merge(($context["right_field_options"] ?? null), ["on_change" => "this.form.submit()"]);
        // line 162
        echo "               ";
        $context["condition"] = ["is_helpdeskvisible" => 1];
        // line 165
        echo "               ";
        if (((($__internal_compile_4 = ($context["params"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["type"] ?? null) : null) == twig_constant("Ticket::INCIDENT_TYPE"))) {
            // line 166
            echo "                  ";
            $context["condition"] = twig_array_merge(($context["condition"] ?? null), ["is_incident" => 1]);
            // line 167
            echo "               ";
        } elseif (((($__internal_compile_5 = ($context["params"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["type"] ?? null) : null) == twig_constant("Ticket::DEMAND_TYPE"))) {
            // line 168
            echo "                  ";
            $context["condition"] = twig_array_merge(($context["condition"] ?? null), ["is_request" => 1]);
            // line 169
            echo "               ";
        }
        // line 170
        echo "               ";
        echo twig_call_macro($macros["fields"], "macro_dropdownField", ["ITILCategory", "itilcategories_id", (($__internal_compile_6 =         // line 173
($context["params"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["itilcategories_id"] ?? null) : null), _n("Category", "Categories", 1), twig_array_merge(        // line 175
($context["cat_params"] ?? null), ["condition" => ($context["condition"] ?? null)])], 170, $context, $this->getSourceContext());
        // line 176
        echo "

               ";
        // line 178
        echo twig_call_macro($macros["fields"], "macro_field", ["urgency", twig_get_attribute($this->env, $this->source,         // line 180
($context["item"] ?? null), "dropdownUrgency", [0 => ["value" => (($__internal_compile_7 =         // line 181
($context["params"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["urgency"] ?? null) : null), "width" => "100%", "display" => false, "required" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 184
($context["right_field_options"] ?? null), "fields_template", [], "any", false, false, false, 184), "isMandatoryField", [0 => "urgency"], "method", false, false, false, 184)]], "method", false, false, false, 180), __("Urgency"),         // line 187
($context["right_field_options"] ?? null)], 178, $context, $this->getSourceContext());
        // line 188
        echo "

               ";
        // line 190
        if (((($__internal_compile_8 = $this->extensions['Glpi\Application\View\Extension\SessionExtension']->session("glpiactiveprofile")) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["helpdesk_hardware"] ?? null) : null) && twig_length_filter($this->env, (($__internal_compile_9 = $this->extensions['Glpi\Application\View\Extension\SessionExtension']->session("glpiactiveprofile")) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["helpdesk_item_type"] ?? null) : null)))) {
            // line 191
            echo "                  ";
            ob_start(function () { return ''; });
            // line 192
            echo "                     <a class=\"btn btn-sm btn-ghost-secondary mt-2\" role=\"button\"
                        id=\"btn-collapse-items";
            // line 193
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\"
                        aria-expanded=\"false\" aria-controls=\"collapse-items";
            // line 194
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\"
                        data-bs-toggle=\"collapse\" href=\"#collapse-items";
            // line 195
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\" >
                        <i class=\"fas fa-plus\"></i>
                     </a>
                     <div class=\"collapse\" id=\"collapse-items";
            // line 198
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\">
                        ";
            // line 199
            $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Item_Ticket::itemAddForm", [0 => ($context["item"] ?? null), 1 => twig_array_merge(($context["params"] ?? null), ["_canupdate" => Session::haveRight("ticket", twig_constant("CREATE")), "_tickettemplate" =>             // line 201
($context["itiltemplate"] ?? null)])]);
            // line 203
            echo "                     </div>
                  ";
            $context["associated_items"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 205
            echo "
                  ";
            // line 206
            echo twig_call_macro($macros["fields"], "macro_field", ["items_id",             // line 208
($context["associated_items"] ?? null), _n("Associated element", "Associated elements", Session::getPluralNumber()),             // line 210
($context["right_field_options"] ?? null)], 206, $context, $this->getSourceContext());
            // line 211
            echo "
               ";
        }
        // line 213
        echo "
                ";
        // line 214
        $context["defaultFieldOptions"] = ["condition" => ["is_active" => 1, "is_ticketheader" => 1], "validation" => ["required" => true, "message" => "Veuillez sélectionner un type de demande."]];
        // line 224
        echo "
                ";
        // line 225
        echo twig_call_macro($macros["fields"], "macro_dropdownField", ["RequestType", "requesttypes_id", (($__internal_compile_10 = twig_get_attribute($this->env, $this->source,         // line 228
($context["item"] ?? null), "fields", [], "any", false, false, false, 228)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["requesttypes_id"] ?? null) : null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("RequestType"), twig_array_merge(((        // line 230
array_key_exists("field_options", $context)) ? (($context["field_options"] ?? null)) : ([])), ($context["defaultFieldOptions"] ?? null))], 225, $context, $this->getSourceContext());
        // line 231
        echo "

               ";
        // line 233
        echo twig_call_macro($macros["fields"], "macro_dropdownField", ["Location", "locations_id", (($__internal_compile_11 =         // line 236
($context["params"] ?? null)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11["locations_id"] ?? null) : null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Location"), twig_array_merge(        // line 238
($context["right_field_options"] ?? null), ["hide_if_no_elements" => true])], 233, $context, $this->getSourceContext());
        // line 241
        echo "

               ";
        // line 243
        echo twig_call_macro($macros["fields"], "macro_textField", ["name", (($__internal_compile_12 =         // line 245
($context["params"] ?? null)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12["name"] ?? null) : null), __("Title"),         // line 247
($context["right_field_options"] ?? null)], 243, $context, $this->getSourceContext());
        // line 248
        echo "

               ";
        // line 250
        echo twig_call_macro($macros["fields"], "macro_textareaField", ["content", (($__internal_compile_13 =         // line 252
($context["params"] ?? null)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13["content"] ?? null) : null), __("Description"), twig_array_merge(        // line 254
($context["right_field_options"] ?? null), ["enable_richtext" => true, "enable_fileupload" => ((twig_get_attribute($this->env, $this->source,         // line 256
($context["itiltemplate"] ?? null), "isHiddenField", [0 => "_documents_id"], "method", false, false, false, 256)) ? (false) : (true))])], 250, $context, $this->getSourceContext());
        // line 258
        echo "
            </div>
        </div>

      ";
        // line 262
        echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\PluginExtension']->callPluginHook(twig_constant("Glpi\\Plugin\\Hooks::POST_ITEM_FORM"), ["item" => ($context["item"] ?? null), "options" => ($context["params"] ?? null)]), "html", null, true);
        echo "

        <div class=\"card-footer text-center\">
            <input type=\"hidden\" name=\"entities_id\" value=\"";
        // line 265
        echo twig_escape_filter($this->env, ($context["entities_id"] ?? null), "html", null, true);
        echo "\" />
            <button type=\"submit\" class=\"btn btn-primary\" name=\"add\">
                <i class=\"fas fa-plus\"></i>
                <span>";
        // line 268
        echo twig_escape_filter($this->env, __("Submit message"), "html", null, true);
        echo "</span>
            </button>
        </div>
    </div>

   ";
        // line 273
        echo twig_include($this->env, $context, "components/itilobject/mainform_close.html.twig");
        echo "
</div>

<script type=\"text/javascript\">

    ";
        // line 278
        if (((twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isNewItem", [], "method", false, false, false, 278) && ($this->extensions['Glpi\Application\View\Extension\SessionExtension']->session("glpiactive_entity") == 0)) &&  !(($__internal_compile_14 = ($context["params"] ?? null)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14["_glpi_csrf_token"] ?? null) : null))) {
            // line 279
            echo "         var myModal = new bootstrap.Modal(document.getElementById('entitiesModal'));
            myModal.show();
            var base_path = ";
            // line 281
            echo json_encode(($context["base_path"] ?? null));
            echo ";
            console.log('base_path:', base_path);
        \$(\"select[name='entities_id']\").parents(\".form-field\").remove();
        \$(\"#itil-form\").prepend(\"<input name='entities_id'  type='hidden'/>\");
        
        const params_dropdown = {
            _idor_token: '";
            // line 287
            echo twig_escape_filter($this->env, Session::getNewIDORToken(), "html", null, true);
            echo "',
            itemtype: \"Entity\",
            multiple: 0,
            values: [],
            valuesnames: [],
            display_emptychoice: 0,
            specific_tags: [],
            itemtype: \"Entity\",
            displaywith: [],
            emptylabel: \"-----\",
            condition: [],
            used: [],
            toadd: [],
            entity_restrict: \"";
            // line 300
            echo twig_escape_filter($this->env, ($context["userentities_encode"] ?? null), "html", null, true);
            echo "\",
            permit_select_parent: 0,
            class: \"form-select\",
            order: null
        }
        
        \$(\"#ticketEntities\").select2({
            width: 'calc(100% - ((2 * 0.9em) + (18px * 2)))',
            multiple: '',
            placeholder: \"\",
            allowClear: false,
            minimumInputLength: 0,
            quietMillis: 100,
            dropdownAutoWidth: true,
            ajax: {
                url: \"";
            // line 315
            echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
            echo "/glpi/ajax/getDropdownValue.php\",
                dataType: 'json',
                type: 'POST',
                data: function (params) {
                query = params;
                return \$.extend({}, params_dropdown, {
                    searchText: params.term,
                    page_limit: 100, // page size
                    page: params.page || 1, // page number
                });
                },
                processResults: function (data, params) {
                params.page = params.page || 1;
                var more = (data.count >= 100);

                return {
                    results: data.results,
                    pagination: {
                            more: more
                    }
                };
                }
            },
        });
        \$(document).on(\"change\", \"#ticketEntities\", function (){
            const value = \$(this).val();
            console.log('val =',value);
            \$(\"input[name='entities_id']\").val(value);
               const redirectURL = `../front/central.php?active_entity=\${value}`;
                window.location.href = redirectURL;
            })
    ";
        }
        // line 347
        echo "
\$(function () {
    \$('#btn-collapse-items";
        // line 349
        echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
        echo "').on('click', function() {
        \$(this).hide();
    });

    \$('#dropdown_nodelegate";
        // line 353
        echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
        echo "').on('change', function() {
        var is_for_me = (\$(this).val() == '1');
        \$('#user-info";
        // line 355
        echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
        echo "-block').toggleClass('d-none', !is_for_me);
        \$('#delegate_other";
        // line 356
        echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
        echo " .card-body')
            .html(\"\")
            .load('";
        // line 358
        echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("ajax/dropdownDelegationUsers.php"), "html", null, true);
        echo "', {
                'right': \"delegate\",
                'nodelegate': (is_for_me ? 1 : 0),
                '_users_id_requester': ";
        // line 361
        echo twig_escape_filter($this->env, (($__internal_compile_15 = ($context["params"] ?? null)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15["_users_id_requester"] ?? null) : null), "html", null, true);
        echo ",
                '_users_id_requester_notif': ";
        // line 362
        echo json_encode((($__internal_compile_16 = ($context["params"] ?? null)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16["_users_id_requester_notif"] ?? null) : null));
        echo ",
                'use_notification': ";
        // line 363
        echo twig_escape_filter($this->env, (($__internal_compile_17 = (($__internal_compile_18 = ($context["params"] ?? null)) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18["_users_id_requester_notif"] ?? null) : null)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17["use_notification"] ?? null) : null), "html", null, true);
        echo ",
                'entity_restrict':  ";
        // line 364
        echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\SessionExtension']->session("glpiactive_entity"), "html", null, true);
        echo "
            });
    })

    saveActorsToDom();
});
</script>

";
    }

    public function getTemplateName()
    {
        return "components/itilobject/selfservice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  514 => 364,  510 => 363,  506 => 362,  502 => 361,  496 => 358,  491 => 356,  487 => 355,  482 => 353,  475 => 349,  471 => 347,  436 => 315,  418 => 300,  402 => 287,  393 => 281,  389 => 279,  387 => 278,  379 => 273,  371 => 268,  365 => 265,  359 => 262,  353 => 258,  351 => 256,  350 => 254,  349 => 252,  348 => 250,  344 => 248,  342 => 247,  341 => 245,  340 => 243,  336 => 241,  334 => 238,  333 => 236,  332 => 233,  328 => 231,  326 => 230,  325 => 228,  324 => 225,  321 => 224,  319 => 214,  316 => 213,  312 => 211,  310 => 210,  309 => 208,  308 => 206,  305 => 205,  301 => 203,  299 => 201,  298 => 199,  294 => 198,  288 => 195,  284 => 194,  280 => 193,  277 => 192,  274 => 191,  272 => 190,  268 => 188,  266 => 187,  265 => 184,  264 => 181,  263 => 180,  262 => 178,  258 => 176,  256 => 175,  255 => 173,  253 => 170,  250 => 169,  247 => 168,  244 => 167,  241 => 166,  238 => 165,  235 => 162,  233 => 159,  229 => 157,  227 => 156,  226 => 154,  225 => 150,  224 => 149,  223 => 147,  218 => 144,  212 => 142,  205 => 137,  203 => 136,  202 => 134,  200 => 132,  193 => 127,  191 => 125,  189 => 124,  186 => 123,  183 => 122,  180 => 121,  178 => 120,  173 => 118,  170 => 117,  168 => 116,  162 => 115,  158 => 113,  156 => 111,  155 => 110,  154 => 108,  153 => 106,  150 => 105,  144 => 101,  142 => 100,  141 => 98,  135 => 96,  133 => 95,  128 => 92,  126 => 91,  118 => 86,  110 => 81,  105 => 79,  102 => 78,  96 => 75,  78 => 59,  76 => 58,  73 => 57,  63 => 54,  60 => 53,  58 => 52,  53 => 49,  51 => 44,  49 => 42,  48 => 41,  47 => 37,  45 => 36,  42 => 35,  40 => 34,  37 => 33,);
    }

    public function getSourceContext()
    {
        return new Source("", "components/itilobject/selfservice.html.twig", "/opt/lampp/htdocs/glpi/templates/components/itilobject/selfservice.html.twig");
    }
}
