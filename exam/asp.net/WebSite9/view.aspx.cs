using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.SqlClient;
using System.Data;

public partial class WebSite9_view : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=D:\asp.net_prectice\App_Data\external.mdf;Integrated Security=True;Connect Timeout=30;User Instance=True");
    SqlCommand cmd = new SqlCommand();
    SqlDataAdapter adp = new SqlDataAdapter();
    DataSet ds = new DataSet();

    protected void Page_Load(object sender, EventArgs e)
    {
        if(con.State==ConnectionState.Broken||con.State==ConnectionState.Closed)
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
            Response.Redirect("login.aspx");
        }


        display();

    }

    public void display()
    {

        SqlDataAdapter adp = new SqlDataAdapter("select * from stud", con);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        SqlCommand cmd = new SqlCommand("delete from stud where id='"+TextBox1.Text+"'", con);
        cmd.ExecuteNonQuery();
        Response.Write("delete record");
        display();
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        String genderx=null;
        if(RadioButton1.Checked==true)
        {
            genderx="male";
        }
        if(RadioButton2.Checked==true)
        {
            genderx="female";
        }
        String city=Convert.ToString(DropDownList1.SelectedItem);
        SqlCommand cmd = new SqlCommand("insert into stud values('" + TextBox2.Text + "','"+genderx+"','" +city+ "','"+TextBox3.Text+"')", con);
        cmd.ExecuteNonQuery();
        Response.Write("insert record");
        display();

        TextBox1.Text = string.Empty;
        TextBox2.Text = string.Empty;
        TextBox3.Text = string.Empty;
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        String genderx = null;
        if (RadioButton1.Checked == true)
        {
            genderx = "male";
        }
        if (RadioButton2.Checked == true)
        {
            genderx = "female";
        }
        string city = Convert.ToString(DropDownList1.SelectedItem);
        SqlCommand cmd = new SqlCommand("update stud set name='"+TextBox2.Text+"',gender='"+genderx+"',city='"+city+"',password='"+TextBox3.Text+"' where id='"+TextBox1.Text+"'", con);
        cmd.ExecuteNonQuery();
        Response.Write("update record");
        display();


    }
    protected void Button4_Click(object sender, EventArgs e)
    {
        SqlDataAdapter adp = new SqlDataAdapter("select * from stud where id='"+TextBox1.Text+"'", con);
        DataSet ds = new DataSet();
        ds.Tables.Clear();
        adp.Fill(ds);
        GridView1.DataSource = ds;
        GridView1.DataBind();
        
    }
    protected void GridView1_SelectedIndexChanged(object sender, EventArgs e)
    {
        TextBox1.Text = GridView1.SelectedRow.Cells[1].Text;
        TextBox2.Text = GridView1.SelectedRow.Cells[2].Text;
        string gender = GridView1.SelectedRow.Cells[3].Text;
        if (gender == "male")
        {
            RadioButton1.Checked = true;
        }
        else if(gender=="female")
        {
            RadioButton2.Checked = true;
        }
       
        TextBox3.Text = GridView1.SelectedRow.Cells[5].Text;
    }
    protected void Button6_Click(object sender, EventArgs e)
    {
        Session["new"] = null;
        Response.Redirect("login.aspx");
    }
}