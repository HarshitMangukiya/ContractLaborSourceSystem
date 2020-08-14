using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Data;

public partial class display : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=D:\asp.net_prectice\WebSite10\App_Data\student.mdf;Integrated Security=True;User Instance=True");
    SqlCommand cmd = new SqlCommand();
    SqlDataAdapter adp = new SqlDataAdapter();
    DataSet ds = new DataSet();
    protected void Page_Load(object sender, EventArgs e)
    {
        if (con.State == ConnectionState.Broken || con.State == ConnectionState.Closed)
        {
            con.Open();
            Response.Write("connection");
            displays();
        }
        if (Session["new"] == null)
        {
            Response.Redirect("login_emp.aspx");
        }
       
    }
    public void displays()
    {
        SqlDataAdapter adp = new SqlDataAdapter("StoredProcedure2", con);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
        
    }

    protected void Button1_Click(object sender, EventArgs e)
    {

        SqlCommand cmd = new SqlCommand("StoredProcedure5", con); ;
        cmd.Parameters.AddWithValue("@var1", TextBox3.Text);
        cmd.CommandType = CommandType.StoredProcedure;

        SqlDataAdapter adp = new SqlDataAdapter(cmd);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();

        
    }

    protected void Button2_Click(object sender, EventArgs e)
    {
        Session["new"] = null;
        Response.Redirect("login_emp.aspx");
    }
}