<xf:title>{{ phrase('spam_cleaner:') }} {$user.username}</xf:title>

<xf:form action="{{ link('spam-cleaner', $user) }}" ajax="true" class="block">
    <div class="block-container">
        <div class="block-body">
            <xf:checkboxrow label="{{ phrase('spam_cleaner_actions') }}">
                <xf:option name="action_threads" checked="{$xf.options.spamDefaultOptions.action_threads}">
                    <xf:label>
                        <xf:if is="$xf.options.spamThreadAction.action == 'move'">
                            {{ phrase('move_spammers_threads') }}
                            <xf:else />
                            {{ phrase('delete_spammers_threads') }}
                        </xf:if>
                    </xf:label>
                </xf:option>
                <xf:option name="delete_messages" checked="{$xf.options.spamDefaultOptions.delete_messages}">
                    <xf:label>{{ phrase('delete_spammers_messages') }}</xf:label>
                </xf:option>
                <xf:option name="delete_conversations" checked="{$xf.options.spamDefaultOptions.delete_conversations}">
                    <xf:label>{{ phrase('delete_conversations_by_spammer') }}</xf:label>
                </xf:option>
                <xf:option name="ban_user" checked="{$xf.options.spamDefaultOptions.ban_user}">
                    <xf:label>{{ phrase('ban_spammer') }}</xf:label>
                </xf:option>
                <xf:if is="$canViewIps">
                    <xf:option name="check_ips" checked="{$xf.options.spamDefaultOptions.check_ips}">
                        <xf:label>{{ phrase('check_spammers_ips') }}</xf:label>
                    </xf:option>
                </xf:if>
            </xf:checkboxrow>
        </div>

        <xf:submitrow submit="{{ phrase('clean') }}" />
    </div>

    <xf:hiddenval name="no_redirect">{$noRedirect}</xf:hiddenval>
</xf:form>
