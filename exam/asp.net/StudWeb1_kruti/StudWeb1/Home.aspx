<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Home.aspx.cs" Inherits="Home" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    <table>
    <tr>
    <td>
        <asp:Label ID="Label1" runat="server" Text="Rollno:"></asp:Label>
        </td>
    <td>
        <asp:TextBox ID="txtid" runat="server" Enabled="False"></asp:TextBox>
    </td>
    <td></td>
    </tr>

    <tr>
    <td>
        <asp:Label ID="Label2" runat="server" Text="Name:"></asp:Label>
        </td>
    <td>
        <asp:TextBox ID="txtnm" runat="server"></asp:TextBox>
        </td>
    <td>
         <asp:RequiredFieldValidator ID="r1" runat="server" ControlToValidate="txtnm" ErrorMessage="*" ForeColor="Red"/>
    </td>
    
    </tr>

    <tr>
    <td>
        <asp:Label ID="Label3" runat="server" Text="Password:"></asp:Label>
        </td>
    <td>
        <asp:TextBox ID="txtpwd" runat="server"></asp:TextBox>
        </td>

    </tr>

    <tr>
    <td>&nbsp;<asp:Label ID="Label4" runat="server" Text="Confirm Password:"></asp:Label>
        </td>
    <td>
        <asp:TextBox ID="txtcpwd" runat="server"></asp:TextBox>
        </td>
                    <td>
         <asp:comparevalidator ID="c1" runat="server" ControlToCompare="txtcpwd" ControlToValidate="txtpwd" ForeColor="Red" ErrorMessage="Both pwd must be matched!"/>
    </td>

    </tr>

    <tr>
    <td>
        <asp:Label ID="Label5" runat="server" Text="Gender"></asp:Label>
        </td>
    <td>
        <asp:RadioButton ID="Male" runat="server" GroupName="gender" Text="Male" />
        <asp:RadioButton ID="Female" runat="server" GroupName="gender" Text="Female"/>
    </td>
    
    </tr>

    <tr>
    <td>
        <asp:Label ID="Label6" runat="server" Text="Age"></asp:Label>
        </td>
    <td>
        <asp:TextBox ID="txtage" runat="server"></asp:TextBox>
        </td>
        <td>
        <asp:RangeValidator ID="r3" runat="server" ControlToValidate="txtage" MinimumValue="18" MaximumValue="30" ErrorMessage="Invalid Age" ForeColor="Red"/>
    </td>
    
    </tr>

    <tr>
    <td>
        <asp:Label ID="Label7" runat="server" Text="PhoneNo.:"></asp:Label>
        </td>
    <td>
        <asp:TextBox ID="txtphone" runat="server"></asp:TextBox>
        </td>
        <td>
        <asp:RegularExpressionValidator ID="r5" runat="server" ControlToValidate="txtphone" ValidationExpression="[9][0-9]{9}" ForeColor="Red" ErrorMessage="Invalid Phone" />
        </td>
    </tr>

    <tr>
    <td>&nbsp;<asp:Label ID="Label8" runat="server" Text="Hobbies:"></asp:Label>
        </td>
    <td>
        <asp:CheckBox ID="Dancing" runat="server" Text="Dancing" />
        <asp:CheckBox ID="Singing" runat="server" Text="Singing" />
        <asp:CheckBox ID="Reading" runat="server" Text="Reading"/>
        </td>
    </tr>

    <tr>
    <td>&nbsp;<asp:Label ID="Label9" runat="server" Text="State:"></asp:Label>
        </td>
    <td>
        <asp:DropDownList ID="stcombo" runat="server" AutoPostBack="True" onselectedindexchanged="stcombo_SelectedIndexChanged">
        <asp:ListItem Selected="True">--Select State--</asp:ListItem>
        <asp:ListItem>Gujarat</asp:ListItem>
        <asp:ListItem>Maharashtra</asp:ListItem>
        <asp:ListItem>Rajasthan</asp:ListItem>
        </asp:DropDownList>
      </td>
        <td>
        <asp:RequiredFieldValidator ID="r6" runat="server" ControlToValidate="stcombo" InitialValue="--Select State--" ForeColor="Red" ErrorMessage="*" />
        </td>
    </tr>

    <tr>
    <td>
        <asp:Label ID="Label10" runat="server" Text="City:"></asp:Label>
        </td>
    <td>
        <asp:DropDownList ID="ctcombo" runat="server">
        <asp:ListItem>--Select City--</asp:ListItem>
        
        </asp:DropDownList>
        </td>
        <td>
        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" ControlToValidate="ctcombo" InitialValue="--Select City--" ForeColor="Red" ErrorMessage="*" />
        </td>

    </tr>

    </table>
    </div>
    <asp:Button ID="Button1" runat="server" Height="38px" onclick="Button1_Click" 
        Text="Insert" Width="135px" />
    <asp:Button ID="Button2" runat="server" Height="36px" Text="Update" 
        Width="148px" onclick="Button2_Click" />
    <asp:Button ID="Button3" runat="server" Height="37px" onclick="Button3_Click" 
        Text="Delete" Width="143px" />
    <asp:GridView ID="GridView1" runat="server" Height="199px" Width="425px" 
        CellPadding="4" ForeColor="#333333" GridLines="None" 
        onselectedindexchanged="GridView1_SelectedIndexChanged">
        <AlternatingRowStyle BackColor="White" />
        <Columns>
            <asp:CommandField HeaderText="Select" ShowSelectButton="True" />
        </Columns>
        <EditRowStyle BackColor="#7C6F57" />
        <FooterStyle BackColor="#1C5E55" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#1C5E55" Font-Bold="True" ForeColor="White" />
        <PagerStyle BackColor="#666666" ForeColor="White" HorizontalAlign="Center" />
        <RowStyle BackColor="#E3EAEB" />
        <SelectedRowStyle BackColor="#C5BBAF" Font-Bold="True" ForeColor="#333333" />
        <SortedAscendingCellStyle BackColor="#F8FAFA" />
        <SortedAscendingHeaderStyle BackColor="#246B61" />
        <SortedDescendingCellStyle BackColor="#D4DFE1" />
        <SortedDescendingHeaderStyle BackColor="#15524A" />
    </asp:GridView>
    </form>
</body>
</html>
