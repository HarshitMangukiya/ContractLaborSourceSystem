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
        if (Session["new"] != null)
        {
            Response.Write("login"+Session["new"]);

        }
        else
        {
            Response.Redirect("login_emp.aspx");
        }
        display();
    }

    public void display()
    {
        SqlDataAdapter adp = new SqlDataAdapter("StoredProcedure2", con);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
    }

    protected void Button1_Click1(object sender, EventArgs e)
    {

        SqlCommand cmd = new SqlCommand("StoredProcedure3", con);
        cmd.Parameters.AddWithValue("@var1", TextBox2.Text);
        cmd.Parameters.AddWithValue("@var2", TextBox3.Text);
        cmd.Parameters.AddWithValue("@var3", DropDownList1.SelectedItem.ToString());
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("insert record");
        display();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("StoredProcedure4", con);
        cmd.Parameters.AddWithValue("@var1", TextBox1.Text);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.ExecuteNonQuery();
        Response.Write("delete record");
        display();
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        Session["new"] = null;
        Response.Redirect("login_emp.aspx");
    }
}