using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Data;

public partial class register : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=D:\asp.net_prectice\WebSite11\App_Data\canteen.mdf;Integrated Security=True;User Instance=True");
    SqlCommand cmd = new SqlCommand();
    SqlDataAdapter adp = new SqlDataAdapter();
    DataSet ds = new DataSet();

    protected void Page_Load(object sender, EventArgs e)
    {
        if(con.State==ConnectionState.Closed||con.State==ConnectionState.Broken)
        {
            con.Open();
            Response.Write("connection");
        }
    }

    protected void Button1_Click1(object sender, EventArgs e)
    {
        string streamx = null;
        if (RadioButton1.Checked == true)
        {
            streamx = "science";
        }
        if (RadioButton2.Checked == true)
        {
            streamx = "commerce";
        }
        SqlCommand cmd = new SqlCommand("StoredProcedure6", con);
        cmd.Parameters.AddWithValue("@var1", TextBox1.Text);
        cmd.Parameters.AddWithValue("@var2", TextBox2.Text);
        cmd.Parameters.AddWithValue("@var3", streamx);
        cmd.Parameters.AddWithValue("@var4", DropDownList1.SelectedItem.ToString());
        cmd.Parameters.AddWithValue("@var5", TextBox3.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("insert record");
        Response.Redirect("login.aspx");
    }
}